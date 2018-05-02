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
<div>
	<div class="jumbotron" style="text-align: center;"><h1>Administrator</h1></div>
	<h3>Welcome Back</h3>
</div>
@endsection	