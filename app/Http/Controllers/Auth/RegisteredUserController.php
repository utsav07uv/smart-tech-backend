<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::enum(UserRole::class)],

            'avatar' => [
                Rule::requiredIf($request->role === UserRole::SELLER->value),
                'file'
            ],

            'documents'   => [
                Rule::requiredIf($request->role === UserRole::SELLER->value),
                'array',
            ],

            'documents.*' => [
                Rule::requiredIf($request->role === UserRole::SELLER->value),
                'file',
            ]
        ]);

        try {

            if ($request->hasFile('avatar')) {
                $filePath = upload_image($request->avatar, 'uploads/user');
            }

            if ($request->hasFile('documents')) {
                $filesPath = upload_multiple_images($request->documents, 'uploads/user/documents');
            }

            $user = User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->phone,
                'approved_at' => $request->role === UserRole::CUSTOMER->value ? now() : null,
                'avatar' => $filePath ?? null,
                'documents' => $filesPath ?? null,
            ]);

            toastr()->success('Account created successfully.');
            return redirect(route('login'));

        } catch (\Throwable $th) {
            toastr()->error('Failed to create.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
