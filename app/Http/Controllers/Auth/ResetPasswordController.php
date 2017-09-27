<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('userResetPasswordUpdate');
    }

    public function userResetPasswordShow($id){
        return view('');
    }

    public function userResetPasswordUpdate(Request $request){
        $this->validate($request, [
            'current_password' => 'required_with:password|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::where('id', $request->user_id)->first();
        if (Hash::check($request->current_password, $user->password)){
            $user->update([
                'password' => bcrypt($request->password)
            ]);


        flash('Password has been updated successfully.')->success()->important();
            return redirect('dashboard');
        }
        else{
        return back()->withErrors(['The current password is incorrect.']);;
        }
    }
}