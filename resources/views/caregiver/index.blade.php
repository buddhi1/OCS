<!DOCTYPE html>
<html>
<head>
	<title>Caregiver information</title>
</head>
<body>
@if(\Session::has('caregiver'))
	<div class="alert alert-danger">
		<h3>Caregiver Information not found!!! Try again</h3>
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
			<th>Address</th>
			<th>City</th>
			<th>CPA</th>
			<th>License Number</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($caregivers as $caregiver)
		<tr>
			<td>{{$caregiver->id}}</td>
			<td>{{$caregiver->last_name}} ,{{$caregiver->first_name}}</td>
			<td>{{$caregiver->address}}</td>
			<td>{{$caregiver->city}}</td>
			<td>{{$caregiver->cpa}}</td>
			<td>{{$caregiver->license_no}}</td>
			<td>
				<form  action="{{url('caregiver', [$caregiver->id])}}/edit">
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('caregiver', [$caregiver->id])}}" method="POST">
   					 {{method_field('DELETE')}}
					{{ csrf_field() }}
					<button>Delete</button>
					<input type="hidden" value="{{$caregiver->id}}" name="id">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	{{ $caregivers->links() }}
@endif
</body>
</html>