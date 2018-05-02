@extends('layouts.admin')

@section('content')		
@if(\Session::has('caseworkers'))
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
			<div class="col-md-12">
				<div class="table-responsive">

					<table class="table table-bordred table-striped" >
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
						@foreach($caseworkers as $caseworker)
						<tr>
							<td>{{$caseworker->id}}</td>
							<td>{{$caseworker->last_name}} ,{{$caseworker->first_name}}</td>
							<td>{{$caseworker->phone}}</td>
							<td>{{$caseworker->address}}</td>
							<td>{{$caseworker->zip_code}}</td>
							<td>{{$caseworker->country}}</td>
							<td>{{$caseworker->email}}</td>
							<td>
								<form  action="{{url('caseworker', [$caseworker->id])}}/edit">
									<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
								</form>
							</td>
							<td>
								<form action="{{url('caseworker', [$caseworker->id])}}" method="POST">
										 {{method_field('DELETE')}}
									{{ csrf_field() }}
									<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
									<input type="hidden" value="{{$caseworker->id}}" name="id">
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				@endif


				</div>
			</div>


	</div>
	<div>
		{{ $caseworkers->links() }}
	</div>
</div>
@endsection

