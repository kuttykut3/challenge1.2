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

    <form action="{{ route('assignmentStu') }} ", method="GET">
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

   <table border="1" width="100%">
       <tr>
           <th>Challenge Name</th>
           <th>#</th>
       </tr>
       @foreach ($challenges as $challenge)
           <tr>
               <td>{{ $challenge->challengeName }}</td>
               <td> 
                   <form action="{{ route('detailChallengeStu', ['id' => $challenge->id]) }} ", method="GET">
                       @csrf
                       <button>
                           Detail
                       </button>
                   </form>
   
               </td>
               
           </tr>    
           
       @endforeach
   </table>
   {{ $challenges->links() }}

   </x-app-layout>