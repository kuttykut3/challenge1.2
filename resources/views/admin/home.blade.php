<x-app-layout>
 {{-- <a href="{{ route('add') }}">
    New
</a> --}}
<form action="{{ route('add') }} ", method="GET">
    @csrf
    <button>
        New
    </button>
</form>
<table border="1" width="100%">
    <tr>
        <th>Username</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Role</th>
        <th>#</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ ($user->role == '0') ? 'Student' : 'Teacher' }}</td>
            <td> 
                {{-- <a href = 'delete/{{ $users->id }}'>Delete</a> --}}
                <form action="{{ route('edit', ['id' => $user->id]) }} ", method="GET">
                    @csrf
                    <button>
                        Edit
                    </button>
                </form>

                <form action="{{ route('destroy', ['id' => $user->id]) }} ", method="POST">
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
{{ $users->links() }}

<form action="{{ route('assignment') }} ", method="GET">
    @csrf
    <button>
        Assignment
    </button>
</form>

</x-app-layout>
