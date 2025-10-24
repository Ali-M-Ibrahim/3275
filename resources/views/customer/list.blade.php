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
                <a href="{{ route('customer.show',['customer'=>$obj->id])  }}">View</a>
                <a href="{{ route('customer.edit',['customer'=>$obj->id])  }}">Edit</a>
                <a href="{{ route('deleteResource',['id'=>$obj->id])  }}">Delete</a>
                <form action="{{route('customer.destroy',['customer'=>$obj->id])}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete" />
                </form>


            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</body>
</html>
