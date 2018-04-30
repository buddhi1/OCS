<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<style media="screen">
	.btn-danger{

			margin-left: -90px;
	}
	.btn-primary{
		margin-left: -53px;
	}

	</style>
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

<div class="container">

		<div class="row">

				<div class="col-md-12">

						<div class="table-responsive">


							<table class="table table-bordred table-striped">
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
											<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
										</form>
									</td>
									<td>
										<form action="{{url('advocate', [$advocate->id])}}" method="POST">
												 {{method_field('DELETE')}}
											{{ csrf_field() }}
											<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
											<input type="hidden" value="{{$advocate->id}}" name="id">
										</form>
									</td>
								</tr>
								@endforeach
							</table>
							@endif


						</div>


				</div>


		</div>


</div>




</body>
</html>
