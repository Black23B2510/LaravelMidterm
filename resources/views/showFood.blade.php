<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <title>Show food</title>
  <style>
    .food{
      display: grid;
      grid-template-columns: 25% 25% 25% 25%;
    }
  </style>
</head>
<body>
  @if(Session::has('success'))
  {{ Session::get('success') }}
@endif
  <h1>-------------------------------------------------Cơm Dĩa--------------------------------------</h1>
  @foreach ($foods as $food)
  @csrf
    <div>
      <div class="food">
        <div>
          <a href="{{ route('foods.show', $food->id) }}"><img src="/images/{{$food->image}}" alt=""></a>
        </div>
        <div>
          <div>{{$food->name}}</div>
          <div>{{$food->description}}</div>
        </div>
        <div>----------------------------------------------------</div>
        <div>
          <h4>{{$food->price}}VND</h4>
        </div>
      </div>
    </div>
  @endforeach
  <h1>-------------------------------------------------Bánh Mì--------------------------------------</h1>
  @foreach ($food2 as $food)
  @csrf
    <div>
      <div class="food">
        <div>
          <a href="{{ route('foods.show', $food->id) }}"><img src="/images/{{$food->image}}" alt=""></a>
        </div>
        <div>
          <div>{{$food->name}}</div>
          <div>{{$food->description}}</div>
        </div>
        <div>----------------------------------------------------</div>
        <div>
          <h4>{{$food->price}}VND</h4>
        </div>
      </div>
    </div>
  @endforeach
  <h1>-------------------------------------------------Bún Phở--------------------------------------</h1>
  @foreach ($food3 as $food)
  @csrf
    <div>
      <div class="food">
        <div>
          <a href="{{ route('foods.show', $food->id) }}"><img src="/images/{{$food->image}}" alt=""></a>
        </div>
        <div>
          <div>{{$food->name}}</div>
          <div>{{$food->description}}</div>
        </div>
        <div>----------------------------------------------------</div>
        <div>
          <h4>{{$food->price}}VND</h4>
        </div>
      </div>
    </div>
  @endforeach
  <div><a  href={{ route('foods.create') }}><button class="btn btn-primary" type="submit">ADD A NEW FOOD</button></a></div>
</body>
</html>