<!DOCTYPE html>
<html>
    <head>
    <title>File details</title>
    </head>

<body>
    {{ $viewFile->name }} <br>

    {{-- <iframe height="700" width="1400" src="F:/XamPP/htdocs/bai1.2/storage/app/{{$viewFile->path}}"> </iframe> --}}
    <iframe height="650" width="1400" src="http://localhost/bai1.2/storage/app/{{$viewFile->path}}"> </iframe>
</body>

</html>

<form action="{{ route('assignment') }} ", method="GET">
    @csrf
    <button>
        Back to Assignments
    </button>
</form>

{{-- F:/XamPP/htdocs/bai1.2 --}}