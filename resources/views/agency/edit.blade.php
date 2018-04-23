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

@if(\Session::has('caseworker'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('agency', $agency->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
<h1>Case Worker Information</h1>
<label>first name</label>
<input type="text" name="first name" value="{{$agency->first_name}}">

<label>last name</label>
<input type="text" name="last name" value="{{$agency->last_name}}">

<label>phone</label>
<input type="text" name="phone" value="{{$agency->phone}}">

<label>address</label>
<input type="text" name="address" value="{{$agency->address}}">

<label>zip code</label>
<input type="text" name="zip_code" value="{{$agency->zip_code}}">

<label>country</label>
<input type="text" name="country" value="{{$agency->country}}">

<label>e-mail</label>
<input type="text" name="email" value="{{$agency->email}}">

<button type="Submit">Update</button>
</form>
</body>
</html>