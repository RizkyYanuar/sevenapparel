<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
        // Simpan pesan error dalam session
        Session::flash('error', 'Anda tidak memiliki wewenang untuk mengakses halaman tersebut.');
        }

        return $request->expectsJson() ? null : route('login-form');
    }
}
