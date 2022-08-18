<x-app-layout>

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

<form action="{{ route('challenges') }} ", method="GET">
    @csrf
    <button>
        Challenges
    </button>
</form>

</x-app-layout>
