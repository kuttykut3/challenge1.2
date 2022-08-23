{{-- <x-app-layout> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments [' . $detailFile->name . ']') }}
        </h2>
    </x-slot>
    <h3>
        File: 
        <a href="{{ route('viewFileStu', ['id' => $detailFile->id]) }}", method="GET">{{$detailFile->name}}</a>
    </h3>

    <h3>
        Download File: 
        <a href="{{ route('downloadFileStu', ['id' => $detailFile->id]) }}", method="GET">{{$detailFile->name}}</a>
        
    </h3>

    <div class="container mt-4">
 
        <h2>Turn in</h2>
       
            <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('turnIn', ['id' => $detailFile->id]) }}" >
             @csrf          
                <div class="row">
       
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file" placeholder="Choose file" id="file">
                              @error('file')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
                       
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>     
            </form>
      </div>

      <h3>File submitted: </h3>
      <table border="1" width="100%">
        <tr>
            <th>Time submit</th>
            <th>File</th>
            <th>#</th>
        </tr>
        
        @foreach ($files as $file)
            @if ($detailFile->id == $file->assignment_id)
            <tr>
                <td>{{ $file->created_at }}</td>
                <td><a href="{{ route('viewFileTurnedIn', ['id' => $file->id]) }}", method="GET">{{ $file->name }}</a></td>
                <td> 
                {{-- @foreach ($student as $stu)
                   @if($stu->id == $file->owner_id)
                        {{$stu->name}}
                    @endif
                @endforeach --}}
                </td>
               
            </tr>    
            @endif      
        @endforeach
         
    </table>

    <form action="{{ route('assignmentStu') }} ", method="GET">
        @csrf
        <button>
            Back to Assignments
        </button>
    </form>
{{-- </x-app-layout> --}}
