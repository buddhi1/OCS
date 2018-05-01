<!-- <!DOCTYPE html>
<html>
<head>
	<title>Schools Information</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<style media="screen">

	.btn-primary{
		margin-left: -160px;
	}

	.btn-danger{
		margin-left: -280px;
	}

</style>
<body> -->
@extends('layouts.admin')

@section('content')	
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


<div class="container">

		<div class="row">

				<div class="col-md-12">

					<table class="table table-bordred table-striped">
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
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
								</form>
							</td>
							<td>
								<form action="{{url('school', [$school->id])}}" method="POST">
									{{method_field('DELETE')}}
									{{ csrf_field() }}
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					{{ $schools->links() }}
					 @endif


				</div>

		</div>

</div>

@endsection

<!-- </body>
</html> -->
