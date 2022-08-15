<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//     public function index()
//    {
//         $users = DB::table('users')->simplePaginate(10);
//        //  ->simplePaginate(5)
//         return view('users.index', ['users'=> $users]);
//    }

   public function add()
   {
          return view('users.add'); 
   }

   public function save(Request $request)
   {
          $user = new User();
          $user->username = $request->get('username');  
          $user->password = Hash::make($request->get('password'));
          $user->name = $request->get('name'); 
          $user->email = $request->get('email'); 
          $user->phone = $request->get('phone'); 
          $user->role = $request->get('role');   
          $user->save(); 

          return redirect('/redirect');
   }

   public function destroy(User $id) {
      // DB::delete('delete from users where id = ?',[$id]);
       $id->delete();

       return redirect('/redirect');
    }
  
    public function edit($id) {
       $edituser = User::find($id);

       return view('users.edit',compact('edituser')); 
     }

     public function update(Request $request, $id)
   {      
       
        $user = User::where('id', $id)->update(
              ['username' => $request->get('username'),
              'password' => $request->get('password'),
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'phone' => $request->get('phone')
              ]
        );

          return redirect('/redirect');
   }

}