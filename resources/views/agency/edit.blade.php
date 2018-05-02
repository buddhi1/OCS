<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

@if(\Session::has('caseworker'))
    <div class="alert alert-success">
        Error
    </div>
@endif
	<form action="{{url('agency', $agency->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}




<div class="container-flex">


          <div>
                <div class="col-md-12 col-xs-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is your first name?</label>
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
                      <label for="example-password-input" class="col-2 col-form-label">Which county?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="{{$agency->country}}" id="example-password-input" name="country">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is your e-mail?</label>
                      <div class="col-10">
                        <input class="form-control" type="email" value="{{$agency->email}}" id="example-number-input" name="email">
                      </div>
                    </div>

										<!-- <div class="container"> -->
          <div>
            <div class="col-xs-4 col-sm-4 col-md-6">
          <button class="btn btn-primary btn-sx" type="Submıt">Submit</button>
        </div>
          </div>
        <!-- </div> -->



</form>
@endsection
<!-- </body>
</html> -->
