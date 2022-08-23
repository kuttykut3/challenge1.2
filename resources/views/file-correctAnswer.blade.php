<!DOCTYPE html>
<html>
    <head>
    <title>Challenge details</title>
    </head>

<body>
    {{$filename}} <br>

    <iframe height="650" width="1400" src="http://localhost/bai1.2/public/storage/{{$filename}}"> </iframe>
</body>

</html>

<form action="{{ route('challenges') }} ", method="GET">
    @csrf
    <button>
        Back to Challenge
    </button>
</form>

{{-- F:/XamPP/htdocs/bai1.2 --}}