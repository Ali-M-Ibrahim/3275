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

<div>
    <p>Name: {{$storeName}}</p>
    <p>Telephone: {{$telephone}}</p>
    <p>Address: {{$address}}</p>
    <p>Fax: {{$fax}}</p>
</div>


<a href="{{route('add-customer')}}">Add Customer</a>
<h1>{{ $title }}</h1>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mydata as $obj)
        <tr>
            <td>{{$obj->id}}</td>
            <td>{{$obj->first_name}}</td>
            <td>{{$obj->last_name}}</td>
            <td>
                <a href="{{ route('view-single-customer',['id'=>$obj->id])  }}">View</a>
                <a href="{{ route('edit-customer',['id'=>$obj->id])  }}">Edit</a>
                <a href="{{ route('delete-customer2',['id'=>$obj->id])  }}">Delete</a>
                <form action="{{route('delete-customer2',['id'=>$obj->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete" />
                </form>


            </td>
        </tr>
    @endforeach
    </tbody>

</table>



{{$services}}

</body>
</html>
