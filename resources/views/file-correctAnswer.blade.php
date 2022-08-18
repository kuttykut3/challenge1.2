<!DOCTYPE html>
<html>
    <head>
    <title>Challenge details</title>
    </head>

<body>
    {{ $challenge->name }} <br>

    {{-- <iframe height="700" width="1400" src="F:/XamPP/htdocs/bai1.2/storage/app/{{$viewFile->path}}"> </iframe> --}}
    <iframe height="650" width="1400" src="http://localhost/bai1.2/storage/app/{{$challenge->path}}"> </iframe>
</body>

</html>

<form action="{{ route('challenges') }} ", method="GET">
    @csrf
    <button>
        Back to Challenge
    </button>
</form>

{{-- F:/XamPP/htdocs/bai1.2 --}}