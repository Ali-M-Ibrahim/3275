<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        h1{
            color:red
        }
    </style>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>
<button onclick="test()">
    CLick me
</button>

@for($i=0;$i<5;$i++)
    @if($i==3)
{{--        @break;--}}
        @continue
    @endif
    <p>{{ $i }}</p>
@endfor

<script>
    function test(){
        alert("hello class");
    }
</script>
</body>
</html>
