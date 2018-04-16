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

@if(\Session::has('success'))
<div class="alert alert-success">
  {{\Session::get('success')}}
</div>
@endif
	<form action="{{url('caseworker')}}" method="POST">
		{{csrf_field()}}
<h1>Case Worker Information</h1>
<label>first name</label>
<input type="text" name="first name">

<label>last name</label>
<input type="text" name="last name">

<label>phone</label>
<input type="text" name="phone">

<label>address</label>
<input type="text" name="address">

<label>zip code</label>
<input type="text" name="zip_code">

<label>country</label>
<input type="text" name="country">

<label>e-mail</label>
<input type="text" name="email">

<button type="Submit">Submit</button>
</form>
</body>
</html>