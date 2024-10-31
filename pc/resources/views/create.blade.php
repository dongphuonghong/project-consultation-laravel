<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout') 
@section('content')
<style>
.uper {
margin-top: 40px;
}
</style>
<div class="card uper">
<div class="card-header">
<h3>thêm mới</h3>
</div>
<div class="card-body"> @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div><br /> @endif
<form method="post" action="{{ route('pcs.store') }}">
<div class="form-group"> @csrf
<label for="name">ten pc :</label>
<input type="text" class="form-control" name="pc_name"/>
</div>
<div class="form-group">
<label for="price">So ISBN :</label>
<input type="text" class="form-control" name="isbn_no"/>
</div>
<div class="form-group">
<label for="quantity">Gia :</label>
<input type="text" class="form-control" name="pc_price"/>
</div>
<button type="submit" class="btn btn-primary">Them moi</button>
</form>
</div>
</div>
 @endsection
</body>
</html>