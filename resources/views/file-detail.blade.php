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

    <form action="{{ route('assignment') }} ", method="GET">
        @csrf
        <button>
            Back to Assignments
        </button>
    </form>
</x-app-layout>
