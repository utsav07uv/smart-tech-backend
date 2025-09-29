<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::query()
            ->get();


        return view('backend.payment.index', [
            'payments' => $payments
        ]);
    }

    public function store(Request $request)
    {
        try {

            DB::transaction(function () use ($request) {

                $user = Auth::user();

                $order = Order::with('orderVendors')->findOrFail($request->order_id);

                if (! $order) {
                    throw new \Exception("Order not found.");
                }

                Payment::create([
                    'order_id'      => $order->id,
                    'user_id'      => $user->id,
                    'order_number'        => $order->order_number,
                    'method'           => 'cod',
                    'amount'        => $order->total,
                    'status' => PaymentStatus::PENDING
                ]);


                $order->orderVendors()->update([
                    'status' => OrderStatus::PROCESSING
                ]);

                $order->update([
                    'status' => OrderStatus::PROCESSING
                ]);
            });

            toastr()->success('Order confirmed successfully.');

            return redirect(route('frontend.checkout', $order->order_number));
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return back();
        }
    }

    public function stripePost(Request $request)
    {
        try {
            
            $order = Order::findOrFail($request->order_id);

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $charge = Charge::create([
                "amount" => $order->total * 100,
                "currency" => "aud",
                "source" => $request->stripeToken,
                "description" => "Payment for order {$order->order_number} by {$order->user->name}"
            ]);


            if ($charge) {
                Payment::create([
                    'order_id'      => $order->id,
                    'user_id'      => Auth::id(),
                    'order_number'        => $order->order_number,
                    'method'           => 'card',
                    'amount'        => $order->total,
                    'status' => PaymentStatus::COMPLETED,
                    'transaction_id' => $charge->id,
                    'receipt' => $charge->receipt_url
                ]);

                $order->update([
                    'status' => OrderStatus::PROCESSING,
                ]);

                $order->orderVendors()->update([
                    'status' => OrderStatus::PROCESSING,
                ]);
            }

            toastr()->success('Payment Successful!');

            return view('frontend.pages.checkout-success', [
                'orderNumber' => $order->order_number,
            ]);
        } catch (\Throwable $th) {
            toastr()->error('Payment Failed!');
            toastr()->error($th->getMessage());
            return back();
        }
    }
}
