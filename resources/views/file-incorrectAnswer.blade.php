<!DOCTYPE html>
<html>
<head>
<title>Incorrect</title>
</head>

<body>
<h1>
    Sorry, your answer is incorrect, view hint and try again!
</h1>
    {{$ans}}
</body>
<form action="{{ route('detailChallenge', ['id' => $challenge->id]) }} ", method="GET">
    @csrf
    <div class="flex items-center center mt-4">
        <x-jet-button class="ml-4">
            {{ __('Back') }}
        </x-jet-button>
    </div>
</form>

</html>