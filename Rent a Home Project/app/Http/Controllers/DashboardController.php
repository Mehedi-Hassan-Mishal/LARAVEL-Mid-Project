<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;





class DashboardController extends Controller
{
    

    public function profile()
    {
        return view('profile');
    }
    public function admin_edit()
    {
        return view('admin_edit');
              
    }

    public function Update(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:4|max:20',
            'email'=>'required|email|max:200',
        ],
        [
         'name.required'=>'Please Input a Name.',
         'name.string'=>'Please Input string value.',
         'name.min'=>'Must be Longer than 4 characters.',
         'name.max'=>'Too much lengthy.',
         'email.required'=>'Please enter a valid email.',
         'email.email' => 'Invalid email address!',
         'email.max'=>'Too much lengthy.',
        ]);

        $id=Auth::user()->id;

        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return Redirect()->back()->with('success','Profile updated');

     

    }

    public function change_password()
    {
        return view('change_password');
              
    }

    public function Update_password(Request $request)
    {
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|min:8|max:200|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|different:old_password',
            'confirm_password'=>'required|min:8|max:200|same:new_password|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|different:old_password',
        ],
        [
         'old_password.required'=>'Enter your old Password.',

         'new_password.required'=>'Enter your new password.',
         'new_password.min'=>'Must be Longer than 8 characters.',
         'new_password.max'=>'Too much lengthy.',
         'new_password.regex' => 'Invalid password formate!',
         'new_password.different'=>'Must be different than old password.',
         

         'confirm_password.required'=>'Need to confirm your new password.',
         'confirm_password.min'=>'Must be Longer than 8 characters.',
         'confirm_password.max'=>'Too much lengthy.',
         'confirm_password.same'=>'New password & confirm password must be same.',
         'confirm_password.regex' => 'Invalid password formate!',
         'confirm_password.different'=>'Must be different than old password.',
        ]);


     $current_user=auth()->user();

    if(Hash::check($request->old_password,$current_user->password)){
        $current_user->update([
            'password'=>bcrypt($request->new_password)
        ]);
        return back()->with('success','Password successfully updated.');
    }else{ 
        return back()->with('error','Old password does not matched.');
    }
    
    }
   
    public function user_list()
    {
       $allManager=Manager::all();
       $allUser=User::all();
        return view('user_list', ['allManager'=>$allManager],['allUser'=>$allUser]);   
    }
   
    public function user_edit($id)
    {
         $data=DB::table('users')->where('id',$id)->first();
         return view('user_edit',['data'=>$data]);
    }

    public function update_user(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required|email',
           
       ]);
       $query=DB::table('users')
       ->where('id',$request->id) 
       ->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'status'=>$request->status,
       ]);
       if($query){
           return redirect('user_list')->with('success', 'Updated successfully');
       }else{
           return back()->with('fail','Something went wrong');
       }
              
    }

    

    
}
