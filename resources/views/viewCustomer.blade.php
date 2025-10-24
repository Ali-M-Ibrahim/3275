<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <style>
        :root{
            --accent:#ff6b6b;
            --muted:#6b7280;
            --card-bg: linear-gradient(135deg,#fff 0%, #f7fbff 100%);
        }
        *{box-sizing:border-box}
        body{
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:100vh;
            background: linear-gradient(180deg,#f0f6ff 0%, #fff 100%);
            margin:0;
            padding:24px;
        }
        .property-card{
            width:360px;
            border-radius:16px;
            overflow:hidden;
            box-shadow: 0 10px 30px rgba(20,30,70,0.08);
            background:var(--card-bg);
            transition:transform .25s ease, box-shadow .25s ease;
        }
        .property-card:hover{
            transform:translateY(-8px);
            box-shadow: 0 20px 50px rgba(20,30,70,0.12);
        }
        .property-img{
            width:100%;
            height:200px;
            object-fit:cover;
            display:block;
        }
        .card-body{
            padding:18px;
        }
        .title{
            margin:0 0 8px 0;
            font-size:18px;
            color:#0f172a;
        }
        .desc{
            margin:0 0 12px 0;
            color:var(--muted);
            font-size:14px;
            line-height:1.4;
        }
        .meta{
            display:flex;
            gap:12px;
            color:var(--muted);
            font-size:13px;
            margin-bottom:14px;
        }
        .btn{
            display:inline-block;
            padding:10px 14px;
            background: linear-gradient(90deg,var(--accent), #ff8a8a);
            color:white;
            text-decoration:none;
            border-radius:10px;
            font-weight:600;
            box-shadow: 0 6px 18px rgba(255,107,107,0.18);
        }
        .btn:hover{ transform:translateY(-2px);}
        .plain-link{
            margin-top:12px;
            font-size:13px;
            color:var(--muted);
        }
        .plain-link a{ color:#0b63ff; text-decoration:none;}
        .plain-link a:hover{ text-decoration:underline;}

    </style>
</head>
<body>



<div class="property-card">
    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80"
         alt="Modern home exterior - Apni Zameen Apna Ghar" class="property-img">
    <div class="card-body">
        <h3 class="title">{{$obj->first_name}}   {{$obj->last_name}}</h3>
        <p class="desc">{{$obj->telephone}}</p>
        <div class="meta">
            <span>📍 {{$obj->created_at}}</span>
            <span>💸 {{$obj->updated_at}}</span>
        </div>
        <a href="{{route('list-customers')}}">Back</a>
    </div>
</div>

<br />
<div>
    <p>Name: {{$storeName}}</p>
    <p>Telephone: {{$telephone}}</p>
    <p>Address: {{$address}}</p>
    <p>Fax: {{$fax}}</p>
</div>

<div>
    {{$services}}
</div>


</body>
</html>
