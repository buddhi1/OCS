<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(\Session::has('caseworkers'))
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
		@foreach($caseworkers as $caseworker)
		<tr>
			<td>{{$caseworker->id}}</td>
			<td>{{$caseworker->last_name}} ,{{$caseworker->first_name}}</td>
			<td>{{$caseworker->phone}}</td>
			<td>{{$caseworker->address}}</td>
			<td>{{$caseworker->zip_code}}</td>
			<td>{{$caseworker->country}}</td>
			<td>{{$caseworker->email}}</td>
			
    					
			<td>
				<form  action="{{url('caseworker', [$caseworker->id])}}/edit">
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('caseworker', [$caseworker->id])}}" method="POST">
   					 {{method_field('DELETE')}}
					{{ csrf_field() }}
					<button>Delete</button>
					<input type="hidden" value="{{$caseworker->id}}" name="id">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
@endif
</body>
</html>