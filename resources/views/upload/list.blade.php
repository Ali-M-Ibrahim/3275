<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        table,tr,th,td{
            border:1px solid black;
            padding: 3px;
        }
    </style>
</head>
<body>

<a href="{{route('customer.create')}}">Add Customer</a>
<h1></h1>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $obj)
        <tr>
            <td>{{$obj->id}}</td>
            <td>{{$obj->name}}</td>
            <td><img  width="150" height="150" src="{{asset($obj->path)}}"/></td>
        </tr>
    @endforeach
    </tbody>

</table>
</body>
</html>
