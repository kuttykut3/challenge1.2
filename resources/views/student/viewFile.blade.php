<!DOCTYPE html>
<html>
    <head>
    <title>File details</title>
    </head>

<body>
    {{ $viewFile->name }} <br>

    <iframe height="650" width="1400" src="http://localhost/bai1.2/storage/app/{{$viewFile->path}}"> </iframe>
</body>

</html>

<form action="{{ route('assignmentStu') }} ", method="GET">
    @csrf
    <button>
        Back to Assignments
    </button>
</form>

