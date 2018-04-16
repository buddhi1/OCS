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

@if(\Session::has('success'))
	<div class="alert alert-success">
	  {{\Session::get('success')}}
	</div>
  @endif
  
<form action="{{url('/school')}}" method="POST">
	{{csrf_field()}}
	<h1>Add School</h1>
	<div>
		<label>Name: </label>
		<input type="text" name="name">
	</div>
	<div>
		<label>District: </label>
		<input type="text" name="district">
	</div>
	<div>
		<button type="submit">Save</button>
	</div>
</form>
</body>
</html>