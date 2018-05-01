 <!-- <!DOCTYPE html>
<html>
<head>
	<title>Gift Edit</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag --------

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<style media="screen">
	.btn-primary{
		margin-top: 5px;
	}


</style>
<body> --> -->
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

<div class="container">
	<div class="row">
			<div class="col-md-4 col-xs-12">
				<legend>Gift</legend>

				<div>
					<form action="{{url('child/gift', [$gift->id])}}" method="POST">
					    {{method_field('PATCH')}}
					    {{ csrf_field() }}
						<input class="form-control" type="text" name="item" value="{{$gift->item}}">
						<input class="form-control" type="hidden" name="child_id" value="{{$gift->child_id}}">
						<br>
						<select name="type">
							<option id="optionID" value="0" @if($gift->type == 0) selected @endif>Gift</option>
							<option value="1" @if($gift->type == 1) selected @endif>School item</option>
						</select>
						<br>
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
				</div>

			</div>
	</div>

</div>
<!-- </body>
</html> -->
@endsection