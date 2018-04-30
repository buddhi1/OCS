<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
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

@if(\Session::has('advocate'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('advocate', $advocate->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}


		<div class="container">


		          <div class="row">
		                <div class="col-md-12 col-xs-12">
		                  <div class="form-group">
		                    <div class="form-group">
		                      <label for="example-text-input" class="col-2 col-form-label">What is your first name??</label>
		                      <div class="col-12">
		                        <input class="form-control" type="text" value="{{$agency->first_name}}"  id="example-text-input"  name="first name" required >
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-search-input" class="col-2 col-form-label">What is your last name?</label>
		                      <div class="col-12">
		                        <input class="form-control" type="text"  value="{{$agency->last_name}}"id="example-search-input" name="last name">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-email-input" class="col-2 col-form-label">What is your phone number?</label>
		                      <div class="col-10">
		                        <input class="form-control" type="number" value="{{$agency->phone}}" id="example-email-input" name="phone">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-url-input" class="col-2 col-form-label">What is your address?</label>
		                      <div class="col-10">
		                        <input class="form-control" type="tel" value="{{$agency->address}}" id="example-url-input" name="address">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-tel-input" class="col-2 col-form-label">What is your zip code?</label>
		                      <div class="col-10">
		                        <input class="form-control" type="tel" value="{{$agency->zip_code}}" id="example-tel-input" name="zip_code">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-password-input" class="col-2 col-form-label">Which country</label>
		                      <div class="col-10">
		                        <input class="form-control" type="text" value="{{$agency->country}}" id="example-password-input" name="country">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="example-number-input" class="col-2 col-form-label">What is your email?</label>
		                      <div class="col-10">
		                        <input class="form-control" type="email" value="{{$agency->email}}" id="example-number-input" name="email">
		                      </div>
		                    </div>

												<div class="container">
		          <div class="row">
		            <div class="col-xs-4 col-sm-4 col-md-6">
		          <button class="btn btn-primary btn-sx" type="Submıt">Submit</button>
		        </div>
		          </div>
		        </div>



</form>
</body>
</html>
