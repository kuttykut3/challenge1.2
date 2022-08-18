<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-xl text-gray-900 leading-tight">
            {{$detailChallenge->challengeName}}
        </h1>
    </x-slot>

    {{-- <form action="{{ route('showHint', ['id' => $detailChallenge->id]) }} ", method="GET">
        @csrf
        <button>
           Show hint
        </button>
    </form> --}}

    <form action="{{ route('showHint', ['id' => $detailChallenge->id]) }} ", method="GET">
        @csrf
        <div class="flex items-center center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Show hint') }}
            </x-jet-button>
        </div>
    </form>

    <form method="POST" action="{{ route('answer', ['id' => $detailChallenge->id]) }}">
        @csrf
        
        <div>
            <x-jet-label for="answer" value="{{ __('Type your answer') }}" />
            <x-jet-input id="answer" class="block mt-1 w-full" type="text" name="answer" :value="old('answer')" required autofocus />
        </div>
        
        <div class="flex items-center  mt-4">
            <x-jet-button class="ml-4">
                {{ __('Submit') }}
            </x-jet-button>
        </div>
    </form>

    <form action="{{ route('challenges') }} ", method="GET">
        @csrf
        <button>
            Back to Challenges
        </button>
    </form>
</x-app-layout>