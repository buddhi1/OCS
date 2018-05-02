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

@if(\Session::has('child_id'))
<div class="alert alert-danger">
	<h3>Children Information not found!!! Try again</h3>
</div>
@else

<form action="{{url('/custody/search')}}" method="POST">
	{{csrf_field()}}
	<input type="hidden" name="child_id" value="{{$child_id}}">


		<div class="container-flex">
				<div>
						<div class="col-md-6">
								<legend>Custody</legend>
								<div>
									<input  class="form-control" type="text" name="search_name" placeholder="Search">
								</div>
										 <div class="form-group">
											 <label for="form-check-label" class="col-2 col-form-label">Please check the buttons you want to search with</label>
											 <div class="col-10">
											 <div>
												<input type="radio" name="address" value="1">
										<label>Zipcode</label>
									 </div>
											 <div>
												<input type="radio" name="address" value="2">
										<label>County</label>
									 </div>
									 <div>
										<label>Level of license</label>
										<select name="license_level" class="form-control">
											<option value="1">Level 1</option>
											<option value="2">Level 2</option>
											<option value="3">Level 3</option>
											<option value="4">Level 4</option>
											<option value="5">Level 5</option>
										</select>
									 </div>
												</div>
												</div>

								<div>
									<button class="btn btn-primary" type="submit">Search</button>
								</div>
						</div>
				</div>
		</div>


</form>
@endif
@endsection

