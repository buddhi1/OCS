<!DOCTYPE html>
<html>
<head>
	<title>Custody</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<body>
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

@if(\Session::has('child_id'))
<div class="alert alert-danger">
	<h3>Children Information not found!!! Try again</h3>
</div>
@else

<form action="{{url('/custody/search')}}" method="POST">
	{{csrf_field()}}
	<input type="hidden" name="child_id" value="{{$child_id}}">


		<div class="container">
				<div class="row">
						<div class="col-md-6">
								<legend>Custody</legend>
								<div>
									<input  class="form-control" type="text" name="search_name">
								</div>
										 <div class="form-group">
											 <label for="form-check-label" class="col-2 col-form-label">Please check the buttons you want to search with</label>
											 <div class="col-10">
											 <div>
												<input type="radio" name="address" value="1">
										<label>Zipcode</label>
									 </div>
											 <div>
												<input type="radio" name="address" value="2">
										<label>County</label>
									 </div>
									 <div>
										<label>Level of license</label>
										<select name="license_level">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									 </div>
												</div>
												</div>

								<div>
									<button class="btn btn-primary" type="submit">Search</button>
								</div>
						</div>
				</div>
		</div>


</form>
@endif
</body>
</html>
