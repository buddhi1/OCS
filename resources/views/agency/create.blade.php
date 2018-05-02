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
	<form action="{{url('agency')}}" method="POST">
		{{csrf_field()}}

<div class="container-flex">
          <legend>Agency Information</legend>

          <div>
                <div class="col-md-12 col-xs-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is your first name?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value=""  id="example-text-input"  name="first name" required >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-search-input" class="col-2 col-form-label">What is your last name?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value="" required=""id="example-search-input" name="last name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-email-input" class="col-2 col-form-label">What is your phone number?</label>
                      <div class="col-10">
                        <input class="form-control" type="number" value="" id="example-email-input" name="phone">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-url-input" class="col-2 col-form-label">What is your address?</label>
                      <div class="col-10">
                        <input class="form-control" type="tel" value="" id="example-url-input" name="address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-tel-input" class="col-2 col-form-label">What is your zip code?</label>
                      <div class="col-10">
                        <input class="form-control" type="tel" value="" id="example-tel-input" name="zip_code">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-password-input" class="col-2 col-form-label">Which county?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-password-input" name="country">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is your e-@mail?</label>
                      <div class="col-10">
                        <input class="form-control" type="email" value="" id="example-number-input" name="email">
                      </div>
                    </div>

										<!-- <div class="container"> -->
          <div>
            <div class="col-xs-4 col-sm-4 col-md-6">
          <button class="btn btn-primary btn-sx" type="Submıt">Save</button>
        </div>
          </div>
        <!-- </div> -->
</form>
@endsection

