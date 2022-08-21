<?php
 
namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\StuFile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    public function index()
    {
      $users = User::simplePaginate(10);
      return view('student.listuser', ['users'=> $users]);
    }

     public function indexStu()
    {
        $files = File::simplePaginate(10);
          
        return view('student.assignment', ['files'=> $files]);
    }


    public function detailStu($id) {
        $detailFile = File::find($id);

        $files = StuFile::simplePaginate(1000)->where('owner_id','=',Auth::id());
 
        return view('student.assignmentDetail',compact('detailFile'), ['files'=> $files]); 
      }

      public function viewFileStu($id) {
        $viewFile = File::find($id);
 
        return view('student.viewFile',compact('viewFile'));
     }

     public function downloadFile(Request $request, $id) {
      $downloadFile = File::find($id);
     
      return response()->download('F:/XamPP/htdocs/bai1.2/storage/app/'.$downloadFile->path);
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

   public function turnIn(Request $request, $id)
    {
         
        // $validatedData = 
        $request->validate([
         'file' => 'required' , 'mimes:csv,txt,xlx,xls,doc,pdf', 'max:2048',
        ]);

        $request->file('file')->store('files');
    
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public');
 
        $save = new StuFile();
 
        $save->name = $name;
        $save->path = $path;
        $save->owner_id = Auth::user()->id;
        $save->assignment_id = $id;
        $save->save();
 
        return redirect('/assignmentStu');
 
    }

    public function challengesStu()
    {
        $challenges = Challenge::paginate(10);
          
        return view('student.challenges', ['challenges'=> $challenges]);
    }

    public function detailChallengeStu($id) {
      $detailChallenge = Challenge::find($id);
  
      return view('student.challengeDetail', ['detailChallenge'=> $detailChallenge]);
     }

     public function showHintStu($id)
   {
        $hintChallenge = Challenge::find($id);

        return view('student.challengeHint', ['hintChallenge'=> $hintChallenge]);
   
   }

   public function answerStu(Request $request, $id)
    {
        $challenge = Challenge::find($id);

        if($challenge->name == $request->get('answer').'.txt')
        {
            return view('student.correctAnswer', ['challenge'=> $challenge]);
        }
        else
        {
            return view('student.incorrectAnswer', ['challenge'=> $challenge]);
        }
 
    }

}