<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
   {
        $users = User::paginate(10);
        return view('admin.listuser', ['users'=> $users]);
   }

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

     public function detailUser($id) {
       $detailuser = User::find($id);

      // $thread_id = DB::select('select thread_id from participants 
      // where thread_id in
      //   (select thread_id from messages
      //   where user_id = $id) and user_id = Auth::id() ');
       $thread_id = Participant::paginate(1000)
      ->where('user_id', $id);
      // dd($thread_id);

        // $messages = Message::query()
        //         ->where('user_id', Auth::id())
        //         ->where('thread_id', $thread_id);
        
        
      $messages = Message::paginate(1000)->where('user_id','=', Auth::id());
      // ->where('thread_id','=', $thread_id);
  
        // $messages = Message::query()
        // ->where('thread_id', $thread_id)
        // ->where('user_id', $id);

    
       return view('users.detail',compact('detailuser'),['messages'=> $messages]); 
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
