<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return match ($request->user()->role) {
            UserRole::ADMIN  => redirect()->route('admin.dashboard'),
            UserRole::SELLER => redirect()->route('seller.dashboard'),
            UserRole::CUSTOMER => view('dashboard'),
            default => abort(403, 'Unauthorized access.'),
        };
    }
}