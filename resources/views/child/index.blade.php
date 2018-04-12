<!DOCTYPE html>
<html>
<head>
	<title>Childern information</title>
</head>
<body>
@if(\Session::has('children'))
	<div class="alert alert-danger">
		<h3>Children Information not found!!! Try again</h3>
	</div>
@else
	<table border="1">
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Type</th>
			<th>Date of birth</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($children as $child)
		<tr>
			<td>{{$child->id}}</td>
			<td>{{$child->last_name}} ,{{$child->first_name}}</td>
			<td>{{$child->type}}</td>
			<td>{{$child->dob}}</td>
			<td>
				<form>
					<button>Edit</button>
					<input type="hidden" value="{{$child->id}}" name="id">
				</form>
			</td>
			<td>
				<form>
					<button>Delete</button>
					<input type="hidden" value="{{$child->id}}" name="id">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
@endif
</body>
</html>