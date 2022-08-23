<?php
 
namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\StuFile;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
     public function index()
    {
        $files = File::simplePaginate(10);
          
        return view('file-index', ['files'=> $files]);
    }

    public function upload()
    {
        return view('file-upload');
    }
 
    public function destroyFile(File $id) {
         $id->delete();
  
         return redirect('/assignment');
      }

    public function detail($id) {
        $detailFile = File::find($id);

        $files = StuFile::simplePaginate(10);

        $student = User::all();
         
        return view('file-detail',compact('detailFile'), ['files'=> $files,'student'=> $student]); 
      }

    public function viewFile($id) {
        $viewFile = File::find($id);
 
        return view('file-view',compact('viewFile'));
     }

     public function viewFileTurnedIn($id) {
      $viewFile = StuFile::find($id);

      return view('file-view',compact('viewFile'));
   }

    public function store(Request $request)
    {
         
        // $validatedData = 
        $request->validate([
         'file' => 'required' , 'mimes:csv,txt,xlx,xls,doc,pdf', 'max:2048',
        ]);

        $request->file('file')->store('files');
    
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public');
 
        $save = new File();
 
        $save->name = $name;
        $save->path = $path;
        $save->save();
 
        return redirect('/assignment');
 
    }

    public function changeFile($id) {
        $changeFile = File::find($id);
 
        return view('file-change',compact('changeFile')); 
      }


      public function updateFile(Request $request, $id)
      {      
          
           $file = File::where('id', $id)->update(
                 ['name' => $request->file('file')->getClientOriginalName(),
                 'path' => $request->file('file')->store('public')
                 ]
           );
   
             return redirect('/assignment');
      }

      public function challenges()
    {
        $challenges = Challenge::paginate(10);
          
        return view('file-challenges', ['challenges'=> $challenges]);
    }

    public function uploadChallenge()
    {
        return view('file-UpLoadChallenge');
    }

    public function storeChallenge(Request $request)
    {
         
        // $validatedData = 
        $request->validate([
         'file' => 'required' , 'mimes:csv,txt,xlx,xls,doc,pdf', 'max:2048',
        ]);

        $request->file('file')->store('files');
    
        $name = $request->file('file')->getClientOriginalName();
 
        $save = new Challenge();
 
        $save->hint = $request->get('hint');
        $save->challengeName = $request->get('challengeName');
        $save->save();

        $newfile = $request->file('file')->storeAs('', $save->id.'.'.$name);
 
        return redirect('/challenges');
        
    }

    public function destroyChallenge(Challenge $id) {
      $id->delete();

      return redirect('/challenges');
   }

   public function detailChallenge($id) {
    $detailChallenge = Challenge::find($id);

    return view('file-challengeDetail', ['detailChallenge'=> $detailChallenge]);
   }

    
   public function showHint($id)
   {
        $hintChallenge = Challenge::find($id);

        return view('file-challengeHint', ['hintChallenge'=> $hintChallenge]);
   
   }

   public function answer(Request $request, $id)
    {
        $challenge = Challenge::find($id);

        if(Storage::disk('local')->exists($challenge->id.'.'.$request->get('answer')).'.txt')
        {
            $filename = $challenge->id.'.'.$request->get('answer').'.txt';
            return view('file-correctAnswer', ['challenge'=> $challenge, 'filename' => $filename]);
        }
        else
        {
            $ans = substr(($challenge->path),7,-4);
            return view('file-incorrectAnswer', ['challenge'=> $challenge, 'ans' => $ans]);
        }
 
    }


}