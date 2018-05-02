@extends('layouts.admin')

@section('content')
<div class="container-flex">
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

	<form action="{{url('user', [$user->id])}}" onsubmit="return passwordConfirm()" method="POST">
	    {{method_field('PATCH')}}
	    {{ csrf_field() }}
	    <div class="col-md-12 col-xs-6">
	    <legend>Reset Password</legend>
			<h3>{{$user->email}}</h3>
			<div class="form-group">
				<label class="control-label col-sm-2">New Password</label>
				<div>
					<input class="form-control" type="password" name="new_password" id="new_password">
				</div>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<div>
					<input class="form-control" class="control-label col-sm-2" type="password" name="confirm_password" id="confirm_password">
				</div>
			</div>
			<div class="form-group">
				<div>
					<button type="submit" id="submit" class="btn btn-default">Update</button>
				</div>
			</div>
		</div>
	</form>
	@endsection
</div>