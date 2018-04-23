<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Caregiver Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{url('/')}}/css/ChildrensInformation.css">
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

	@if(\Session::has('child'))
      <div class="alert alert-success">
          Error
      </div>
  @endif

  <form action="{{url('child', [$child->id])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
        <div class="container">
          <legend>Children Information</legend>
          <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is the first name of child?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value="{{$child->first_name}}" id="example-text-input" name="first_name">
                      </div>
                      <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is the Last name of child?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value="{{$child->last_name}}" id="example-text-input" name="last_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-search-input" class="col-2 col-form-label">The children is:(Please select one)</label>
                      <div class="col-10">
                          <input type="radio" name="type" value="1" @if($child->type == 1) {{"checked"}} @endif >
                               Biological Child
                           </label>
                           <br>
                          <input type="radio" name="type" value="2" @if($child->type == 2) {{"checked"}} @endif >
                               Kinship Partner
                           </label>
                           <br>

                           <input type="radio" name="type" value="3" @if($child->type == 3) {{"checked"}} @endif >
                                Foster
                            </label>
                            <br>
                            <input type="radio" name="type" value="4" @if($child->type == 4) {{"checked"}} @endif >
                                 Adoption Prep
                             </label>
                             <br>
                             <input type="radio" name="type" value="5" @if($child->type == 5) {{"checked"}} @endif >
                                  Adopted
                              </label>
                              <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-email-input" class="col-2 col-form-label">What is the CPS case number?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="{{$child->cps_no}}" id="example-email-input" name="cps_no">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-url-input" class="col-2 col-form-label">What is the Child's DOB?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="{{$child->dob}}" id="example-url-input" name="dob">
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label for="example-tel-input" class="col-2 col-form-label">Special Needs?</label>
                      <div class="col-10">
                        <input class="form-control" type="tel" value="" id="example-tel-input">
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="example-password-input" class="col-2 col-form-label">What is the name of child's caseworker?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="{{$child->caseworker_id}}" id="example-password-input" name="caseworker_id">
                      </div>
                    </div>
                    <div class="form-group">{{$child->first_name}}
                      <label for="example-number-input" class="col-2 col-form-label">Who is the name of child's CASA advocate?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="{{$child->advocate_id}}" id="example-number-input" name="advocate_id">
                      </div>
                    </div>
{{$child->caseworker_id}}

                    <fieldset>
   <legend>School Info for school supplies?</legend>
   <div class='row'>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_title">What is school district?</label>
               <input class="form-control" id="user_title" name="" size="30" type="text" />
           </div>
       </div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_firstname">What is the name of school?</label>
               <input class="form-control" id="user_firstname" value="{{$child->school_id}}" name="school_id" size="30" type="text" />
           </div>
       </div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_lastname">Grade?</label>
               <input class="form-control" id="user_lastname" value="{{$child->class}}" name="class" size="30" type="text" />
           </div>


       </div>
   </div>

</fieldset>



                </div>




          </div>

        </div>

        <div>
        	<label>Address</label>
        	<input type="text" name="address1" value="{{$child->address1}}" >
        </div>
        <div>
        	<label>City</label>
        	<input type="text" name="city" value="{{$child->city}}" >
        </div>
        <div>
        	<label>Zip</label>
        	<input type="text" name="zip" value="{{$child->zip}}" >
        </div>
        <div>
        	<label>County</label>
        	<input type="text" name="county" value="{{$child->county}}" >
        </div>

        <div class="container">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-6">
          <button class="btn btn-primary btn-sx" type="submit">Update</button>
        </div>
          </div>
        </div>
    </form>
  </body>
</html>
