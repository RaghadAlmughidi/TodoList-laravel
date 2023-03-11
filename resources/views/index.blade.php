<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Todo List</title>
</head>
<body>
    <style>
 body{
    font-family: 'Poppins', sans-serif;

    background-color: #EDDEDF;

 }
 .container{
    width: 50%;
    margin: 0 auto;
    background-color: #061055;
    padding: 1rem;
    color: #fff;
    border-radius: 20px;
 }
 h3{
    text-align: center;
 }
 .addTask{
display: flex;
gap: .20rem;

 }
 input{
    padding: 1rem;
    width: 100%;
    border-radius: 30px;
    border: 3px solid #051055;
 

 }
 button{
    background-color: #D51D1D;
    color:#fff;
    padding: .5rem 1rem;
    border: none;
    border-radius: 50%;

 }
 li{
    list-style: none;
    font-size: 1rem;
    background-color: #F8C522;
    border-radius: 30px;
    padding: .5rem 1rem ;
    display: flex;
    align-items: center;
    width: 90%;
margin: 1rem 5rem 1rem 0;
    display: flex;
    justify-content: space-between;
    color: #000;
 }
 .deleteBtn{

    padding: .5rem
 }
 ul{
    margin-top: 2rem;
  
 }

    </style>
    <div class="container">
        <h3>What's for today</h3>
        <form action="{{route('store')}}" method="POST" autocomplete="off">
        @csrf
        <div class="addTask">
            <input type="text"name='content' placeholder="add your new todo">
            <button type="submit" class="btn">Go</button>
        </div>
        
        </form>
        @if(count($todolists))
        <ul>
            @foreach ($todolists as $todo)
              <li class="item">
                {{$todo->content}}
            <form class="formContent" action="{{route('destroy',$todo->id)}}" method="POST">
         
                @csrf
            @method('delete')
                <button type="submit" class="deleteBtn"><i class="ri-delete-bin-line"></i></button>
            </form>    
            </li>  
            @endforeach
            
        </ul>
        @else
        <p>no tasks</p>
        @endif
    </div>
</body>
</html>