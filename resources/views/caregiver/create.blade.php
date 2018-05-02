
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

  <form action="{{url('/caregiver')}}" method="POST">
    {{ csrf_field() }}      
        <div class="container-flex">
          <legend>Caregiver Information</legend>  
          <div>
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
                      <label for="example-text-input" class="col-2 col-form-label">What is your e-mail?</label>
                      <div class="col-12">
                        <input class="form-control" type="email" value=""  id="example-text-input"  name="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-text-input" class="col-2 col-form-label">Password</label>
                      <div class="col-12">
                        <input class="form-control" type="password" value=""  id="example-text-input"  name="password">
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
                      <select name="license_type" class="form-control">
                        <option value="1">Care Giver</option>
                        <option value="2">Kinship</option>
                      </select>
                      <!-- <div class="col-10">
                        <input class="form-control" type="text" value="" id="example-number-input" name="license_type"> -->
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
                        <select name="license_level" class="form-control">
                          <option value="1">Level 1</option>
                          <option value="2">Level 2</option>
                          <option value="3">Level 3</option>
                          <option value="4">Level 4</option>
                          <option value="5">Level 5</option>
                          <option value="6">Level 6</option>
                        </select>
                        <!-- <input class="form-control" type="text" value="" id="example-number-input" name="license_level"> -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-number-input" class="col-2 col-form-label">What is the number of maximum foster child you can adopt?</label>
                      <div class="col-10">
                        <input class="form-control" type="number" value="" id="example-number-input" name="max_fosterchild_no">
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
   <div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_title">Biological children</label>
               <input class="form-control" id="user_title" name="bio_children_no" size="30" type="number" />
           </div>
       </div>
       <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_firstname">Kinship children</label>
               <input class="form-control" id="user_firstname" name="kinship_children_no" size="30" type="number" />
           </div>
       </div>
      <!--  <div class='col-sm-4'>
           <div class='form-group'>
               <label for="user_lastname">Foster children</label>
               <input class="form-control" id="user_lastname" name="foster_children_no" size="30" type="number" />
           </div>


       </div> -->
   </div>

</fieldset>
        <!-- <div class="container"> -->
          <div>
            <div class="col-xs-4 col-sm-4 col-md-6">
          <button class="btn btn-primary btn-sx" type="submit">Save</button>
        </div>
          </div>
        <!-- </div> -->
  </form>
  @endsection
