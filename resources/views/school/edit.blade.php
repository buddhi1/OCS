<!DOCTYPE html>
<html>
<head>
	<title>Add School</title>
</head>
<body>
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div><br />
@endif

@if(\Session::has('school'))
  <div class="alert alert-success">
      Error
  </div>
@endif
  
<form action="{{url('school', [$school->id])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
	<h1>Add School</h1>
	<div>
		<label>Name: </label>
		<input type="text" name="name" value="{{$school->name}}" >
	</div>
	<div>
		<label>District: </label>
		<input type="text" name="district" value="{{$school->district}}" >
	</div>
	<div>
		<button type="submit">Update</button>
	</div>
</form>
</body>
</html>