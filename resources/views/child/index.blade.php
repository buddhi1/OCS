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
			<th>Type</th>
			<th>Date of birth</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($children as $child)
		<tr>
			<td>{{$child->id}}</td>
			<td>{{$child->last_name}} ,{{$child->first_name}}</td>
			<td>
				@if($child->type ==1)
					Biological Child 
				@elseif($child->type ==2)
					Kinship Partner 
				@elseif($child->type ==3)
					Foster 
				@elseif($child->type ==4)
					Adoption Prep
				@elseif($child->type ==5) 
					Adopted 
				@endif
			</td>
			<td>{{$child->dob}}</td>
			<td>
				<form  action="{{url('child', [$child->id])}}/edit">
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('child', [$child->id])}}" method="POST">
   					 {{method_field('DELETE')}}
					{{ csrf_field() }}
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