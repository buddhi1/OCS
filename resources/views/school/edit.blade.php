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

@if(\Session::has('school'))
  <div class="alert alert-success">
      Error
  </div>
@endif

<form action="{{url('school', [$school->id])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}



	<div class="container-flex">

		<div>

			<div class="col-md-12 col-xs-12">
						<legend>Add School</legend>
				<div class="form-group">
				<label>Name: </label>
				<input class="form-control" type="text" name="name" value="{{$school->name}}" >
			</div>
			<div>
				<label>District: </label>
				<input class="form-control" type="text" name="district" value="{{$school->district}}" >
			</div>
			<div>
				<button class="btn btn-primary" type="submit">Update</button>
			</div>


			</div>
</div>

		</div>

	</div>



	<div>

</form>
@endsection
