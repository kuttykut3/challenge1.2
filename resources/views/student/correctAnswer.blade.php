<!DOCTYPE html>
<html>
    <head>
    <title>Challenge details</title>
    </head>

<body>
    {{ $challenge->name }} <br>

   
    <iframe height="650" width="1400" src="http://localhost/bai1.2/storage/app/{{$challenge->path}}"> </iframe>
</body>

</html>

<form action="{{ route('challengesStu') }} ", method="GET">
    @csrf
    <button>
        Back to Challenge
    </button>
</form>

