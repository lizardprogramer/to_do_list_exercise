<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    //Create User and login
    public function create(Request $request){

        $formFields=$request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);


        //Hash password
        $formFields['password'] = Hash::make($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        /* auth()->login($user); */

        return redirect('/')->with('message', 'User created successfuly!');;


    }

    //Logout

    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out successfuly!');

    }

    //Authenticate
    public function authenticate(Request $request){
        
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $user=User::where('email', '=', $formFields['email'])->first();
        
        if (Hash::check($formFields['password'], $user->password))
        {
            auth()->login($user);
            return redirect('/index')->with('message', 'User logged in successfuly!');
        } 
        else{
        return back()->with('message', 'Wrong credentials!');
        }
    }

}
