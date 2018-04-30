<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(\Session::has('advocates'))
	<div class="alert alert-danger">
		<h3>Advocate Information not found!!! Try again</h3>
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
			<th>id</th>
			<th>Name</th>
			<th>phone</th>
			<th>address</th>
			<th>zip_code</th>
			<th>country</th>
			<th>email</th>
			<th>Edit</th>
			<th>Delete</th>

		</tr>
		@foreach($advocates as $advocate)
		<tr>
			<td>{{$advocate->id}}</td>
			<td>{{$advocate->last_name}} ,{{$advocate->first_name}}</td>
			<td>{{$advocate->phone}}</td>
			<td>{{$advocate->address}}</td>
			<td>{{$advocate->zip_code}}</td>
			<td>{{$advocate->country}}</td>
			<td>{{$advocate->email}}</td>
			
    					
			<td>
				<form  action="{{url('advocate', [$advocate->id])}}/edit">
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('advocate', [$advocate->id])}}" method="POST">
   					 {{method_field('DELETE')}}
					{{ csrf_field() }}
					<button>Delete</button>
					<input type="hidden" value="{{$advocate->id}}" name="id">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
@endif
</body>
</html>