<!DOCTYPE html>
<html>
<head>
	<title>Schools Information</title>
</head>
<body>
@if(\Session::has('schools'))
	<div class="alert alert-danger">
		<h3>Children Information not found!!! Try again</h3>
	</div>
@else
@if(\Session::has('error'))
    <div class="alert alert-success">
        {{\Session::get('error')}}
    </div>
@endif
@if(\Session::has('success'))
  <div class="alert alert-success">
      {{\Session::get('success')}}
  </div>
 @endif
<table border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>District</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	@foreach($schools as $school)
	<tr>
		<td>{{$school->id}}</td>
		<td>{{$school->name}}</td>
		<td>{{$school->district}}</td>
		<td>
			<form action="{{url('school', [$school->id])}}/edit" method="GET">
				<button type="submit">Edit</button>
			</form>
		</td>
		<td>
			<form>
				<button type="submit">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
 @endif
</body>
</html>