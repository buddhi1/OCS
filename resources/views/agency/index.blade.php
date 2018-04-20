<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(\Session::has('agency'))
	<div class="alert alert-danger">
		<h3>Case worker Information not found!!! Try again</h3>
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
		@foreach($agencies as $agency)
		<tr>
			<td>{{$agency->id}}</td>
			<td>{{$agency->last_name}} ,{{$agency->first_name}}</td>
			<td>{{$agency->phone}}</td>
			<td>{{$agency->address}}</td>
			<td>{{$agency->zip_code}}</td>
			<td>{{$agency->country}}</td>
			<td>{{$agency->email}}</td>
			
    					
			<td>
				<form  action="{{url('agency', [$agency->id])}}/edit">
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('agency', [$agency->id])}}" method="POST">
   					 {{method_field('DELETE')}}
					{{ csrf_field() }}
					<button>Delete</button>
					<input type="hidden" value="{{$agency->id}}" name="id">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
@endif
</body>
</html>