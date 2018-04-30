<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
</head>
<body>
@if(\Session::has('caregiver_results'))
	<div class="alert alert-danger">
		<h3>Desired information is not found please try again!</h3>
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
		<th>County</th>
		<th>Zipcode</th>
		<th>License No</th>
		<th>License Level</th>
		<th>No of children has</th>
		<th>Number of adoption limit</th>
		<th>Assign a child</th>
	</tr>
	@foreach($caregiver_results as $caregiver)
	<tr>
		<td>{{$caregiver->id}}</td>
		<td>{{$caregiver->first_name}} ,{{$caregiver->last_name}}</td>
		<td>{{$caregiver->county}}</td>
		<td>{{$caregiver->zipcode}}</td>
		<td>{{$caregiver->license_no}}</td>
		<td>{{$caregiver->license_level}}</td>
		<td>{{$caregiver->bio_children_no +
			 $caregiver->foster_children_no +
			 $caregiver->kinship_children_no}}</td>
		<td>{{$caregiver->max_fosterchild_no}}</td>
		<td>
			<form action="{{url('custody/assign')}}" method="GET">
				<input type="hidden" name="caregiver_id" value="{{$caregiver->id}}">
				<input type="hidden" name="child_id" value="{{$child_id}}">
				<button type="submit">Assign</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
<div>
	{{ $caregiver_results->links() }}
</div>
 @endif
</body>
</html>