@extends('layouts.admin')

@section('content')	
@if(\Session::has('caregiver'))
	<div class="alert alert-danger">
		<h3>Caregiver Information not found!!! Try again</h3>
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

							<div>


								<table class="table table-striped">
									<tr>
										<th>id</th>
										<th>Name</th>
										<th>Address</th>
										<th>City</th>
										<th>CPA</th>
										<th>License Number</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
									@foreach($caregivers as $caregiver)
									<tr>
										<td>{{$caregiver->id}}</td>
										<td>{{$caregiver->last_name}} ,{{$caregiver->first_name}}</td>
										<td>{{$caregiver->address}}</td>
										<td>{{$caregiver->city}}</td>
										<td>{{$caregiver->cpa}}</td>
										<td>{{$caregiver->license_no}}</td>
										<td>
											<form  action="{{url('caregiver', [$caregiver->id])}}/edit">
												<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
											</form>
										</td>
										<td>
											<form action="{{url('caregiver', [$caregiver->id])}}" method="POST">
													 {{method_field('DELETE')}}
												{{ csrf_field() }}
												<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
												<input type="hidden" value="{{$caregiver->id}}" name="id">
											</form>
										</td>
									</tr>
									@endforeach
								</table>
								<div>
									{{ $caregivers->links() }}
								</div>
							@endif


							</div>


				</div>



		</div>


 </div>
@endsection
