<!DOCTYPE html>
<html>
<head>
	<title></title>
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

@if(\Session::has('advocate'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('advocate', $advocate->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
<legend> Advocate Information</legend>


		<div class="container">

				<div class="row">

						<div class="col-md-12 col-xs-12">

							<label>first name</label>
							<input type="text" class="form-control" name="first name" value="{{$advocate->first_name}}">

							<label>last name</label>
							<input type="text" class="form-control" name="last name" value="{{$advocate->last_name}}">

							<label>phone</label>
							<input type="text" class="form-control" name="phone" value="{{$advocate->phone}}">

							<label>address</label>
							<input type="text" class="form-control" name="address" value="{{$advocate->address}}">

							<label>zip code</label>
							<input type="text" class="form-control" name="zip_code" value="{{$advocate->zip_code}}">

							<label>country</label>
							<input type="text" class="form-control" name="country" value="{{$advocate->country}}">

							<label>e-mail</label>
							<input type="text" class="form-control" name="email" value="{{$advocate->email}}">

							<button class="btn btn-primary" type="Submit">Update</button>


						</div>


				</div>


		</div>




</form>
</body>
</html>
