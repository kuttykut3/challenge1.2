{{-- <x-app-layout> --}}
    <div>
        <p>
            {{$hintChallenge->hint}}
        </p>
    </div>
 
    <form action="{{ route('detailChallengeStu', ['id' => $hintChallenge->id]) }} ", method="GET">
        @csrf
        <div class="flex items-center center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Cancel') }}
            </x-jet-button>
        </div>
    </form>
{{-- </x-app-layout> --}}