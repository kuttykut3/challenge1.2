<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
     public function index()
    {
        $files = File::paginate(10);
          
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
 
        return view('file-detail',compact('detailFile')); 
      }

    public function view($id) {
        $viewFile = File::find($id);
 
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

}