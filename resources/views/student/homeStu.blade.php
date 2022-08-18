<x-app-layout>
    <form action="{{ route('listUserStu') }} ", method="GET">
        @csrf
        <button>
            Users
        </button>
    </form>
   
   <form action="{{ route('assignmentStu') }} ", method="GET">
       @csrf
       <button>
           Assignment
       </button>
   </form>

   <form action="{{ route('challengesStu') }} ", method="GET">
    @csrf
    <button>
        Challenges
    </button>
    </form>
   
   </x-app-layout>
   