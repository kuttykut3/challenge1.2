<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
     public function indexStu()
    {
        $files = File::paginate(10);
          
        return view('student.assignment', ['files'=> $files]);
    }


    public function detailStu($id) {
        $detailFile = File::find($id);
 
        return view('student.assignmentDetail',compact('detailFile')); 
      }

     public function editStu($id) {
      $editStu = User::find($id);

      return view('student.editStu',compact('editStu')); 
    }

    public function updateStu(Request $request, $id)
   {      
       
        $user = User::where('id', $id)->update(
              [
              'password' => $request->get('password'),
              'email' => $request->get('email'),
              'phone' => $request->get('phone')
              ]
        );

          return redirect('/redirect');
   }

}