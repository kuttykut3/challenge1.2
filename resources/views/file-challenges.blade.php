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

    <form action="{{ route('assignment') }} ", method="GET">
        @csrf
        <button>
            Assignment
        </button>
        </form>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Challenges') }}
        </h2>
    </x-slot>
   <form action="{{ route('ChallengeUpload') }} ", method="GET">
       @csrf
       <button>
           New
       </button>
   </form>
   <table border="1" width="100%">
       <tr>
           <th>Challenge Name</th>
           <th>#</th>
       </tr>
       @foreach ($challenges as $challenge)
           <tr>
               <td>{{ $challenge->challengeName }}</td>
               <td> 
                   <form action="{{ route('detailChallenge', ['id' => $challenge->id]) }} ", method="GET">
                       @csrf
                       <button>
                           Detail
                       </button>
                   </form>
   
                   <form action="{{ route('destroyChallenge', ['id' => $challenge->id]) }} ", method="POST">
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
   {{ $challenges->links() }}

   

   {{-- </x-app-layout> --}}