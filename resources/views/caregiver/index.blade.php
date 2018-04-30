<!DOCTYPE html>
<html>
<head>
	<title>Caregiver information</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<style media="screen">
	.btn-danger{

			margin-left: -126px;
	}
	.btn-primary{
		margin-left: -75px;
	}
</style>
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


 <div class="container">

		<div class="row">

				<div class="col-md-12">

							<div class="mytable">


								<table class=table table-boardred table-striped""border="1">
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
												<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
											</form>
										</td>
										<td>
											<form action="{{url('caregiver', [$caregiver->id])}}" method="POST">
													 {{method_field('DELETE')}}
												{{ csrf_field() }}
												<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
												<input type="hidden" value="{{$caregiver->id}}" name="id">
											</form>
										</td>
									</tr>
									@endforeach
								</table>
								{{ $caregivers->links() }}
							@endif


							</div>


				</div>



		</div>


 </div>


</body>
</html>
