<x-app-layout>

    <form action="{{ route('listUserStu') }} ", method="GET">
        @csrf
        <button>
            Users
        </button>
    </form>
    
    <form action="{{ route('messages') }} ", method="GET">
        @csrf
            <button>
                Messages
            </button>
    </form>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Assignments') }}
        </h2>
    </x-slot>
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
                   <form action="{{ route('detailStu', ['id' => $file->id]) }} ", method="GET">
                       @csrf
                       <button>
                           Detail
                       </button>
                   </form>
   
               </td>
               
           </tr>    
           
       @endforeach
   </table>
   {{ $files->links() }}
   
   <form action="{{ route('challengesStu') }} ", method="GET">
    @csrf
    <button>
        Challenges
    </button>
    </form>
 
   
   </x-app-layout>