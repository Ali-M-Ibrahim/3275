<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        form{
            width: 330px;
            margin: auto;
            border: 1px solid black;
            padding: 10px;
        }
        input{
            width: 95%;
            padding-left: 5px;
            padding-right: 5px;
        }

        .btn{
            background: green;
            color: white;
            padding: 10px;
            margin-top: 10px;
        }

        .error{

            color:red
        }
    </style>
</head>
<body>



<h1>Add Image</h1>

<form action="{{route('upload-image3')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="document">Document</label>
        <input  id="document" name="document" type="file"  />
        @error('document')
        <div class="error"> {{$message}}</div>
        @enderror
    </div>

    <input class="btn" type="submit" />

    <a href="">Back</a>

</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
