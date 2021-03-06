@extends('layouts.admin')

@section('content')		
@if(\Session::has('children'))
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

					<div class="table-responsive">

						<table class="table table-bordred table-striped">
							<tr>
								<th>id</th>
								<th>Name</th>
								<th>Type</th>
								<th>Date of birth</th>
								<th>Gifts</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Care Status</th>
							</tr>
							@foreach($children as $child)
							<tr>
								<td>{{$child->id}}</td>
								<td>{{$child->last_name}} ,{{$child->first_name}}</td>
								<td>
									@if($child->type ==1)
										Biological Child
									@elseif($child->type ==2)
										Kinship Partner
									@elseif($child->type ==3)
										Foster
									@elseif($child->type ==4)
										Adoption Prep`
									@elseif($child->type ==5)
										Adopted
									@endif
								</td>
								<td>{{$child->dob}}</td>
								<td>
									<form  action="{{url('child/gift')}}" method="GET">

										<input type="hidden" name="child_id" value="{{ $child->id }}">
										<p data-placement="top" data-toggle="tooltip" title="Add"><button class="btn btn-success btn-xs" data-title="Add" data-toggle="modal" data-target="#add" ><span class="glyphicon glyphicon-plus"></span></button></p>
									</form>
								</td>
								<td>
									<form  action="{{url('child', [$child->id])}}/edit">
										<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
									</form>
								</td>
								<td>
									<form action="{{url('child', [$child->id])}}" method="POST">
											{{method_field('DELETE')}}
										{{ csrf_field() }}
										<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
									</form>
								</td>
								<td>
									@if($child->assign_status == 1)
										<form action="{{url('custody/remove')}}" method="GET">
											<input type="hidden" name="child_id" value="{{$child->id}}">
											<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-warning btn-xs" data-title="Remove" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-user"></span> Remove</button> </p>
										</form>
									@else
										<form action="{{url('custody/create')}}" method="GET">
											<input type="hidden" name="child_id" value="{{$child->id}}">
											<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-success btn-xs" data-title="Assign" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-user"></span> Assign</button> </p>
										</form>
									@endif
								</td>


							</tr>
							@endforeach
						</table>
						<div>
							{{ $children->links() }}
						</div>
					@endif
					</div>
			</div>
	</div>
</div>
@endsection
