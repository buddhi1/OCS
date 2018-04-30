<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Caregiver Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="CaregiverInfo.css">
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

  @if(\Session::has('success'))
        <div class="alert alert-success">
              {{\Session::get('success')}}
        </div>
  @endif      

  <form action="{{url('/caregiver')}}" method="POST">
    {{ csrf_field() }}      
        <div class="container">
          <legend>Caregiver Information</legend>  
          <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is your first name?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value=""  id="example-text-input"  name="first_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is your last name?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value=""  id="example-text-input"  name="last_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">What is your Email?</label>
                      <div class="col-12">
                        <input class="form-control" type="email" value=""  id="example-text-input"  name="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-search-input" class="col-2 col-form-label">What is your adress?</label>
                      <div class="col-12">
                        <input class="form-control" type="text" value="" id="example-search-input" name="address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-email-input" class="col-2 col-form-label">What county do you live?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-email-input" name="county">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-url-input" class="col-2 col-form-label">What is your city?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-url-input" name="city">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-tel-input" class="col-2 col-form-label">What is your zipcode?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-tel-input" name="zipcode">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-password-input" class="col-2 col-form-label">What Child Placing Agency are you licenced with?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-password-input" name="cpa">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">Who is your case worker?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="caseworker_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is the type of your license?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="license_type">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is your license number?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="license_no">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What level of care are you licenced for?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="license_level">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is the number of max foster child you can adopt?</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="max_fosterchild_no">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form-check-label" class="col-2 col-form-label">Are you willing to participate in Respite Program?</label>
                      <div class="col-10">
                          <input type="radio" name="respite" value="1">
			                         Yes
		                       </label>
                          <input type="radio" name="respite" value="2">
			                         No
		                       </label>
                      </div>
                    </div>
                    <fieldset>
   <legend>How many Children do you have?</legend>
   <div class='row'>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_title">Biological children</label>
               <input class="form-control" id="user_title" name="bio_children_no" size="30" type="text" />
           </div>
       </div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_firstname">Kinship children</label>
               <input class="form-control" id="user_firstname" name="kinship_children_no" size="30" type="text" />
           </div>
       </div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_lastname">Foster/Adoptive Placement</label>
               <input class="form-control" id="user_lastname" name="foster_children_no" size="30" type="text" />
           </div>


       </div>
   </div>

</fieldset>
        <div class="container">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-6">
          <button class="btn btn-primary btn-sx" type="submit">Submit</button>
        </div>
          </div>
        </div>
  </form>

  </body>
</html>
