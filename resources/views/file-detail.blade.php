<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments [' . $detailFile->name . ']') }}
        </h2>
    </x-slot>
    <h3>
        File: 
        <a href="{{ route('viewFile', ['id' => $detailFile->id]) }}", method="GET">{{$detailFile->name}}</a>
        
    </h3>
    
    <form action="{{ route('changeFile', ['id' => $detailFile->id]) }} ", method="GET">
        @csrf
        <button>
            Change File
        </button>
    </form>

    
    <table border="1" width="100%">
        <tr>
            <th>Time submit</th>
            <th>File</th>
            <th>Student</th>
        </tr>
        
        @foreach ($files as $file)
            @if ($detailFile->id == $file->assignment_id)
            <tr>
                <td>{{ $file->created_at }}</td>
                <td><a href="{{ route('viewFileTurnedIn', ['id' => $file->id]) }}", method="GET">{{ $file->name }}</a></td>
            
                <td> 
                   {{$file->owner_id}} 
                </td>
               
            </tr>    
            @endif      
        @endforeach
         
    </table>
    {{ $files->links() }}
   

    <form action="{{ route('assignment') }} ", method="GET">
        @csrf
        <button>
            Back to Assignments
        </button>
    </form>
</x-app-layout>
