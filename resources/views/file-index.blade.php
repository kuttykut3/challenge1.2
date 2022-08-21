{{-- <x-app-layout> --}}
    <form action="{{ route('redirect') }} ", method="GET">
        @csrf
        <button>
            Back to Home
        </button>
    </form>
    
    <form action="{{ route('listuser') }} ", method="GET">
        @csrf
        <button>
            Users
        </button>
    </form>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Assignments') }}
        </h2>
    </x-slot>
   <form action="{{ route('fileUpload') }} ", method="GET">
       @csrf
       <button>
           New
       </button>
   </form>
   <table border="1" width="100%">
       <tr>
           <th>Created at</th>
           <th>Description</th>
           <th>#</th>
       </tr>
       @foreach ($files as $file)
           <tr>
               <td>{{ $file->created_at }}</td>
               <td>{{ $file->name }}</td>
               <td> 
                   <form action="{{ route('detail', ['id' => $file->id]) }} ", method="GET">
                       @csrf
                       <button>
                           Detail
                       </button>
                   </form>
   
                   <form action="{{ route('destroyFile', ['id' => $file->id]) }} ", method="POST">
                       @csrf
                       @method('DELETE')
                       <button>
                           Delete
                       </button>
                   </form>
               </td>
               
           </tr>    
           
       @endforeach
   </table>
   {{ $files->links() }}

   <form action="{{ route('challenges') }} ", method="GET">
    @csrf
    <button>
        Challenges
    </button>
    </form>

   {{-- </x-app-layout> --}}