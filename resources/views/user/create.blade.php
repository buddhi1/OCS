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

<form action="{{url('/user')}}" method="POST">
	{{csrf_field()}}

	<div class="container-flex">
		<div>

				<div class="col-md-12 col-xs-6">
					<legend> Add Users</legend>
					<div>
						<label>Name: </label>
						<input class="form-control" type="text" name="name">
					</div>
					<div>
						<label>E-mail: </label>
						<input class="form-control" type="text" name="email">
					</div>
					<div>
						<label>Password: </label>
						<input class="form-control" type="password" name="password">
					</div>
					<div>
						<label>Confirm password: </label>
						<input class="form-control" type="password" name="confirm_password">
					</div>
					<div>
						<button class="btn btn-primary"type="submit">Save</button>
					</div>
				</div>


		</div>
	</div>

</form>
@endsection