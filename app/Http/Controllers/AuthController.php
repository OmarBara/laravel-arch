<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function regidter(Request $request) {
        $fields = $request-> validate([
            'name' => 'required|string',
            'email' => 'required|string|uniqe:user,email',
            'password' => 'required |string|confirmed'
        ]);

    }
    
}
