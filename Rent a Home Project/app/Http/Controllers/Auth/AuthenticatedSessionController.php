<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{

    public function index(){
        if(Auth::user()->hasRole('user')){
        return view('dashboard');
        } elseif(Auth::user()->hasRole('manager')){
            return view('manager_dashboard');
        }elseif(Auth::user()->hasRole('admin')){
            return view('admin_dashboard');
        }
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->validate([
            'email'=>'required|email',
            'password' =>'required|min:5|max:40',
        ]);

        $userInfo=User::where('email','=',$request->email)->first();
        
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
              //$request->session()->put('id',$userInfo->id);
              //return redirect('/dashboard');

              $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME); 
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }

        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
   

    
}
