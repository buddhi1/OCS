@extends('layouts.admin')

@section('content')	
@if(\Session::has('agency'))
	<div class="alert alert-danger">
		<h3>Case worker Information not found!!! Try again</h3>
	</div>
@else
@if(\Session::has('error'))
    <div class="alert alert-success">
        {{\Session::get('error')}}
    </div>
@endif
@if(\Session::has('success'))
  <div class="alert alert-success">
      {{\Session::get('success')}}
  </div>
  @endif

<div class="container-flex">

	<div>

		<div>

			<div class="table-responsive">

				<table class="table table-bordred table-striped">
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>phone</th>
						<th>address</th>
						<th>zip_code</th>
						<th>country</th>
						<th>email</th>
						<th>Edit</th>
						<th>Delete</th>

					</tr>
					@foreach($agencies as $agency)
					<tr>
						<td>{{$agency->id}}</td>
						<td>{{$agency->last_name}} ,{{$agency->first_name}}</td>
						<td>{{$agency->phone}}</td>
						<td>{{$agency->address}}</td>
						<td>{{$agency->zip_code}}</td>
						<td>{{$agency->country}}</td>
						<td>{{$agency->email}}</td>











						<td>
							<form  action="{{url('agency', [$agency->id])}}/edit">
								    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
							</form>
						</td>
						<td>
							<form action="{{url('agency', [$agency->id])}}" method="POST">
									 {{method_field('DELETE')}}
								{{ csrf_field() }}
								    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
								<input type="hidden" value="{{$agency->id}}" name="id">
							</form>
						</td>
					</tr>
					@endforeach
				</table>
				<div>
					{{ $agencies->links() }}
				</div>
			@endif




			</div>

		</div>

	</div>

</div>
@endsection
