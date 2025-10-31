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



<h1>Add Customer</h1>

<form action="{{route('customer.store')}}" method="post">
    @csrf
    <div>
        <label for="first_name">First Name</label>
        <input  id="first_name" name="first_name" type="text" value="{{old('first_name')}}"  />
        @error('first_name')
            <div class="error"> {{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input  id="last_name" name="last_name" type="text" value="{{old('last_name')}}"  />
        @error('last_name')
        <div class="error"> {{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="telephone">Telephone</label>
        <input id="telephone" name="telephone"  type="text"  value="{{old('telephone')}}" />
        @error('telephone')
        <div class="error"> {{$message}}</div>
        @enderror
    </div>
    <input type="password" name="password" />
    <input type="password" name="password_confirmation" />
    @error('password')
    <div class="error"> {{$message}}</div>
    @enderror

    <input class="btn" type="submit" />

    <a href="{{route('customer.index')}}">Back</a>


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
