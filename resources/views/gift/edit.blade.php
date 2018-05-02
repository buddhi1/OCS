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

<div class="container-flex">
	<div>
			<div class="col-md-4 col-xs-12">
				<legend>Gift</legend>

				<div>
					<form action="{{url('child/gift', [$gift->id])}}" method="POST">
					    {{method_field('PATCH')}}
					    {{ csrf_field() }}
					    <div>
							<label>Item Description</label>
							<input class="form-control" type="text" name="item" value="{{$gift->item}}">
							<input class="form-control" type="hidden" name="child_id" value="{{$gift->child_id}}">	
						</div>
						
						<br>
						<select name="type" class="form-control">
							<option id="optionID" value="0" @if($gift->type == 0) selected @endif>Gift</option>
							<option value="1" @if($gift->type == 1) selected @endif>School item</option>
						</select>
						<br>
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
				</div>

			</div>
	</div>

</div>
@endsection