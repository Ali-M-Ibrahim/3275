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
    </style>
</head>
<body>



<h1>Edit Customer</h1>

<form action="{{route('customer.update',['customer'=>$obj->id])}}" method="post">
    @method('put')
    @csrf
    <div>
        <label for="first_name">First Name</label>
        <input id="first_name" value="{{$obj->first_name}}" name="first_name" type="text"  />
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input id="last_name" value="{{$obj->last_name}}" name="last_name" type="text"  />
    </div>

    <div>
        <label for="telephone">Telephone</label>
        <input id="telephone" value="{{$obj->telephone}}" name="telephone"  type="text"  />
    </div>

    <input class="btn" type="submit" />

    <a href="{{Route('customer.index')}}">Back</a>


</form>

</body>
</html>
