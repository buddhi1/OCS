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
	<form action="{{url('caseworker', $caseworker->id)}}" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
<h1>Case Worker Information</h1>
<label>first name</label>
<input type="text" name="first name" value="{{$caseworker->first_name}}">

<label>last name</label>
<input type="text" name="last name" value="{{$caseworker->last_name}}">

<label>phone</label>
<input type="text" name="phone" value="{{$caseworker->phone}}">

<label>address</label>
<input type="text" name="address" value="{{$caseworker->address}}">

<label>zip code</label>
<input type="text" name="zip_code" value="{{$caseworker->zip_code}}">

<label>country</label>
<input type="text" name="country" value="{{$caseworker->country}}">

<label>e-mail</label>
<input type="text" name="email" value="{{$caseworker->email}}">

<button type="Submit">Update</button>
</form>
@endsection

