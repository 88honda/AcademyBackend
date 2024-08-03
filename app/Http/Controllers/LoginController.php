<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if (Gate::allows('student')) {
            return redirect('/student');
        }

        if (Gate::allows('mentor')) {
            return redirect('/mentor');
        }
        return redirect('/dashbord');
    }
}