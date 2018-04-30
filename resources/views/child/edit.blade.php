<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Caregiver Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                        <input class="form-control" id="datepicker" size="30" type="text" name="dob" value="{{$child->dob}}" >
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
                      <div class="col-10" id="caseworker_div">
                        <input class="form-control" type="text" value="" name="caseworker" id="caseworker_id">
                        <input class="form-control" type="hidden" value="{{$child->caseworker_id}}" name="caseworker_id" id="caseworker">
                        <ul class="caseworker-list" id="caseworker-list"></ul>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">Who is the name of child's CASA advocate?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" name="advocate" id="advocate_id">
                        <input class="form-control" type="hidden" value="{{$child->advocate_id}}" name="advocate_id" id="advocate">
                        <ul class="caseworker-list" id="advocate-list"></ul>

                      </div>
                    </div>
                    <fieldset>
   <legend>School Info for school supplies?</legend>
   <div class='row'>
       <!-- <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_title">What is school district?</label>
               <input class="form-control" id="user_title" name="" size="30" type="text" />
           </div>
       </div> -->
       <div class='col-sm-4'>
           <div class='form-group'>
            <label for="user_firstname">What is the name of school?</label>
            <input class="form-control" id="school_name" name="school_name" size="30" type="text" />
            <input class="form-control" type="hidden" value="{{$child->school_id}}" name="school_id" id="school">
            <ul class="caseworker-list" id="school-list"></ul>
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
    <script type="text/javascript">
      var url = "{{url('/')}}";
    </script>
     <script type="text/javascript" src="{{url('/')}}/js/ajax.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/general.js"></script>
    <script type="text/javascript">

      window.onload = function() {
        loadAdvocateByName();
        loadSchoolsByName();
        loadCaseworkersByName();
        document.getElementById('caseworker-list').style.display = 'none'; 
        document.getElementById('school-list').style.display = 'none'; 
        document.getElementById('advocate-list').style.display = 'none'; 
      };
      document.getElementById("caseworker_id").addEventListener("focus", caseworkerDropDown);
      document.getElementById("caseworker_id").addEventListener("keyup", caseworkerDropDown);
      // document.getElementById("caseworker_id").addEventListener("focusout", caseworkerDropShrink);
      document.getElementById("school_name").addEventListener("focus", schoolDropDown);      
      document.getElementById("school_name").addEventListener("keyup", schoolDropDown);
      document.getElementById("advocate_id").addEventListener("focus", advocateDropDown);      
      document.getElementById("advocate_id").addEventListener("keyup", advocateDropDown);

      //datepicker
      $( function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true
        });
        $( "#datepicker" ).datepicker( "option", "showAnim", "slideDown" );        
        $( "#datepicker" ).datepicker( "option", "dateFormat", "yy/mm/dd" );
      } );
      
    </script>
  </body>
</html>
