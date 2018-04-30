<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(\Session::has('users'))
	<div class="alert alert-danger">
		<h3>Users Information not found!!! Try again</h3>
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
 		<th>Email</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 	@foreach($users as $user)
 	<tr>
 		<td>{{$user->id}}</td>
 		<td>{{$user->name}}</td>
 		<td>{{$user->email}}</td>
 		<td>
			<form action="{{url('user', [$user->id])}}/edit" method="GET">
				<button type="submit">Reset Password</button>
			</form>
		</td>
		<td>
			<form action="{{url('user', [$user->id])}}" method="POST">
				{{method_field('DELETE')}}
				{{ csrf_field() }}
				<button>Delete</button>
			</form>
		</td>
 	</tr>
 	@endforeach
 </table>
 @endif
</body>
</html>