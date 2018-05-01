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

<form action="{{url('user', [$user->id])}}" onsubmit="return passwordConfirm()" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
	<h3>{{$user->email}}</h3>
	<div>
		<label>New Password</label>
		<input type="password" name="new_password" id="new_password">
	</div>
	<div>
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password">
		<div id="conf"></div>
	</div>
	<div>
		<button type="submit">Update</button>
	</div>
</form>
@endsection