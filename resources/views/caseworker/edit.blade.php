<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

@if(\Session::has('caseworker'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('caseworker', $caseworker->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
<h1>Case Worker Information</h1>
<label>first name</label>
<input type="text" name="first name" value="{{$caseworker->first_name}}">

<label>last name</label>
<input type="text" name="last name" value="{{$caseworker->last_name}}">

<label>phone</label>
<input type="text" name="phone" value="{{$caseworker->phone}}">

<label>address</label>
<input type="text" name="address" value="{{$caseworker->address}}">

<label>zip code</label>
<input type="text" name="zip_code" value="{{$caseworker->zip_code}}">

<label>country</label>
<input type="text" name="country" value="{{$caseworker->country}}">

<label>e-mail</label>
<input type="text" name="email" value="{{$caseworker->email}}">

<button type="Submit">Update</button>
</form>
</body>
</html>
