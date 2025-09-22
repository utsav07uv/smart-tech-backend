<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->get();
        return view('backend.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::enum(UserRole::class)],
        ]);

        try {

            $user = User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'approved_at' => $request->role === UserRole::ADMIN->value ? now() : null,
            ]);

            toastr()->success('User created successfully.');
            return redirect(route('admin.user.index'));

        } catch (\Throwable $th) {
            toastr()->error('Failed to create.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::enum(UserRole::class)],
        ]);

        try {

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            toastr()->success('Account updated successfully.');
            return redirect(route('login'));

        } catch (\Throwable $th) {
            toastr()->error('Failed to create.', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);

            delete_file_if_exists($user->getRawOriginal('avatar'));
            delete_files_if_exists($user->getRawOriginal('documents'));

            $user->delete();

            toastr()->success('User deleted successfully.');

            return redirect()->route('admin.user.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function approve($id)
    {
        try {

            $user = User::findOrFail($id);

            $user->update([
                'approved_at' => now()
            ]);

            toastr()->success('User approved successfully.');

            return redirect()->route('admin.user.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function disable($id)
    {
        try {

            $user = User::findOrFail($id);

            $user->update([
                'approved_at' => null
            ]);

            toastr()->success('User disabled successfully.');

            return redirect()->route('admin.user.index');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
