<?php

namespace App\Http\Controllers\applicants;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //Register User/Applicant
    public function applicantRegister(Request $request){
        
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required','confirmed','min:8',]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
