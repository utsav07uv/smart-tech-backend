<?php

namespace App\Models\Scopes;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ProductScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (!Auth::check()) {
            abort(404, "Unauthorized");
        }

        $user = Auth::user();

        $builder = match ($user->role) {
            UserRole::ADMIN   => $builder,
            UserRole::SELLER  => $builder->where('user_id', $user->id),
            default           => $builder->where('user_id', $user->id),
        };
    }
}
