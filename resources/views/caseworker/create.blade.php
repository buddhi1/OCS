<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{url('caseWorker')}}" method="POST">
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
<input type="text" name="zip">

<label>country</label>
<input type="text" name="country">

<label>e-mail</label>
<input type="text" name="e-mail">

<button type="Submit">Submit</button>
</form>
</body>
</html>