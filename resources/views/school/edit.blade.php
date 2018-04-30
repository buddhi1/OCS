<!DOCTYPE html>
<html>
<head>
	<title>Add School</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
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



	<div class="container">

		<div class="row">

			<div class="col-md-12 col-xs-12">
						<legend>Add School</legend>
				<div class="form-group">
				<label>Name: </label>
				<input class="form-control" type="text" name="name" value="{{$school->name}}" >
			</div>
			<div>
				<label>District: </label>
				<input class="form-control" type="text" name="district" value="{{$school->district}}" >
			</div>
			<div>
				<button class="btn btn-primary" type="submit">Update</button>
			</div>


			</div>
</div>

		</div>

	</div>



	<div>

</form>
</body>
</html>
