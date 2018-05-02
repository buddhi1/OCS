@extends('layouts.caregiver')

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
								<th>Name</th>
								<th>Type</th>
								<th>Date of birth</th>
								<th>Gifts</th>
							</tr>
							@foreach($children as $child)
							<tr>
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
