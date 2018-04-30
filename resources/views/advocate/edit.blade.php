<!DOCTYPE html>
<html>
<head>
	<title></title>
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

@if(\Session::has('advocate'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('advocate', $advocate->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
<h1>Advocate Information</h1>
<label>first name</label>
<input type="text" name="first name" value="{{$advocate->first_name}}">

<label>last name</label>
<input type="text" name="last name" value="{{$advocate->last_name}}">

<label>phone</label>
<input type="text" name="phone" value="{{$advocate->phone}}">

<label>address</label>
<input type="text" name="address" value="{{$advocate->address}}">

<label>zip code</label>
<input type="text" name="zip_code" value="{{$advocate->zip_code}}">

<label>country</label>
<input type="text" name="country" value="{{$advocate->country}}">

<label>e-mail</label>
<input type="text" name="email" value="{{$advocate->email}}">

<button type="Submit">Update</button>
</form>
</body>
</html>