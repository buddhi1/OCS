<!-- <!DOCTYPE html>
<html>
<head>
	<title>Add School</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body> -->
@extends('layouts.admin')

@section('content')	
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div><br />
@endif

@if(\Session::has('success'))
	<div class="alert alert-success">
	  {{\Session::get('success')}}
	</div>
  @endif

<form action="{{url('/school')}}" method="POST">
	{{csrf_field()}}

	<div class="container">
		<div class="row">

				<div class="col-md-12 col-xs-6">
					<legend> Add School</legend>
					<div>
						<label>Name: </label>
						<input class="form-control" type="text" name="name">
					</div>
					<div>
						<label>District: </label>
						<input class="form-control" type="text" name="district">
					</div>
					<div>
						<button class="btn btn-primary"type="submit">Save</button>
					</div>
				</div>


		</div>
	</div>

</form>
@endsection
<!-- </body>
</html>
 -->