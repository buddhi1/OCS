@extends('layouts.caregiver')

@section('content')
<h1>Change Password</h1>
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div><br />
@endif

@if(\Session::has('user'))
  <div class="alert alert-success">
      Error
  </div>
@endif

<form action="{{url('user/changepassword')}}" onsubmit="return passwordConfirm()" method="POST">
    {{ csrf_field() }}
    <div class="container-flex">
    	<div class="col-md-12 col-xs-6">
			<div>
				<label>Old Password</label>
				<input class="form-control" type="password" name="old_password" id="old_password">
			</div>
			<div>
				<label>New Password</label>
				<input class="form-control" type="password" name="new_password" id="new_password">
			</div>
			<div>
				<label>Confirm Password</label>
				<input class="form-control" type="password" name="confirm_password" id="confirm_password">
				<div id="conf"></div>
			</div>
			<div>
				<button class="btn btn-primary" type="submit">Update</button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	var passwordConfirm = function() {
		var oldPw = document.getElementById('old_password').value();
		var newPw = document.getElementById('new_password').value();
		var confPw = document.getElementById('confirm_password').value();
		if (oldPw != '' && newPw != '' && confPw != '') {
			if (newPw != '' && confPw != '') {
				if (newPw == confPw) {
					return true;
				} else {
					alert('New password does not match with the password confirm');
				 	document.getElementById("new_password").focus();
				 	return false;
				}
			} else {
			return true;
		}
		} else {
			return true;
		}
	} 
</script>
@endsection