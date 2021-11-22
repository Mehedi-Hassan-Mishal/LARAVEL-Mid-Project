<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manager;


class ManagerController extends Controller
{
    public function hire_manager()
    {
        $data=DB::table('managers')->get();

        return view('crud.hire_manager',['manager_list'=>$data]);
              
    }
    public function save_hire_manager(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:managers',
           'mobile'=>'required|min:11|max:11',
       ]);
       $query=DB::table('managers')->insert([
           'name'=>$request->name,
           'email'=>$request->email,
           'mobile'=>$request->mobile,
           'created_at'=>date('Y-m-d h:i:s')
       ]);
       if($query){
           return back()->with('success', 'Inserted successfully');
       }else{
           return back()->with('fail','Something went wrong');
       }
              
    }

    public function edit_manager($id)
    {
         $data=DB::table('managers')->where('id',$id)->first();
         return view('crud.edit_manager',['data'=>$data]);
    }

    public function update_manager(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required|email',
           'mobile'=>'required|min:11|max:11',
       ]);
       $query=DB::table('managers')
       ->where('id',$request->id) 
       ->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'mobile'=>$request->mobile,
           'created_at'=>date('Y-m-d h:i:s')
       ]);
       if($query){
           return redirect('crud')->with('success', 'Updated successfully');
       }else{
           return back()->with('fail','Something went wrong');
       }
              
    }
    public function delete_manager($id)
    {
         $query=DB::table('managers')->where('id',$id)->delete();
         if($query){
            return redirect('crud')->with('success', 'Deleted successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }
    public function list()
    {
        return Manager::all();
    }
    public function add(Request $req)
    {
        $manager= new Manager;
        $manager->name=$req->name;
        $manager->email=$req->email;
        $manager->mobile=$req->mobile;
        $result=$manager->save();
        if($result)
        {
        return ["Result"=>"Data has been saved in database."];  
        }
        else
        {
        return ["Result"=>"Operation failed."];
        }
    }
}
