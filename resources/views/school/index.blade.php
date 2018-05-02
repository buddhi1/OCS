
@extends('layouts.admin')

@section('content')	
@if(\Session::has('schools'))
	<div class="alert alert-danger">
		<h3>Children Information not found!!! Try again</h3>
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

					<table class="table table-bordred table-striped">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>District</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						@foreach($schools as $school)
						<tr>
							<td>{{$school->id}}</td>
							<td>{{$school->name}}</td>
							<td>{{$school->district}}</td>
							<td>
								<form action="{{url('school', [$school->id])}}/edit" method="GET">
									<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
								</form>
							</td>
							<td>
								<form action="{{url('school', [$school->id])}}" method="POST">
									{{method_field('DELETE')}}
									{{ csrf_field() }}
									<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					<div>
						{{ $schools->links() }}
					</div>
					 @endif


				</div>

		</div>

</div>

@endsection
