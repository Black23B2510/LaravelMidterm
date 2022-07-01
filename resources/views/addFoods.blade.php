<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <title>Add Food</title>
  <style>
    img{
      width: 300px;
      height: 500px;
    }
  </style>
</head>
<body>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{route('foods.store')}}" class="was-validated" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="model">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="">
      <small id="model" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" class="form-control" id="description" placeholder="description">
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" value="{{isset($image)?$image:''}}" onchange="changeImage(event)" name="image" class="form-control" id="image" placeholder="" value="">
      <img src="/images/{{ isset($foods)?$foods->image:''}}" alt="" id="newImage">
    </div>
    <div class="form-group">
      <label for="price">Detail</label>
      <input name="detail" type="text" class="form-control" id="detail" placeholder="detail">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input name="price" type="number" class="form-control" id="price" placeholder="price">
    </div>
    <div class="form-group">
      <label for="cate_name">Category</label>
      <select class="form-control" name="cate_id" id="cate_id">
        <option value="1">Bánh mì</option>
        <option value="2">Bún Phở</option>
        <option value="2">Cơm Dĩa</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add new Food</button>
    </div>
  </form>
  <script>
    const changeImage = (e) => {
        console.log('change')
        var imgEle = document.getElementById('newImage')
        imgEle.src = URL.createObjectURL(e.target.files[0])
        imgEle.onload = () => {
            URL.revokeObjectURL(output.src)
            // congdkfj
        }
    }
</script>
</body>
</html>