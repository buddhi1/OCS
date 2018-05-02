
@extends('layouts.admin')

@section('content')
<div class="container-flex">
		<div>
			<div class="col-md-6 col-xs-12">

				<div>
					<legend>Gift</legend>
					<form action="{{url('/child/gift')}}" method="POST">
						{{ csrf_field() }}
						<div>
							<label>Item Description</label>
							<input class="form-control" type="text" name="item">
							<input class="form-control" type="hidden" name="child_id" value="{{$child_id}}">	
						</div>
						<select class="form-control" name="type">
							<option value="0">Gift</option>
							<option value="1">School item</option>
						</select>
						<br>
						<button  id = "btnprimary" class="btn btn-primary" type="submit">Add</button>
					</form>
				</div>

			</div>
		</div>
</div>

<div class="container-flex">

	<div>

			<div class="col-md-12 col-xs-12">


				<div>
					<table class="table table-bordred table-striped">
						<tr>
							<th>ID</th>
							<th>Item</th>
							<th>Type</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						@foreach($gifts as $gift)
						<tr>
							<td>{{$gift->id}}</td>
							<td>{{$gift->item}}</td>
							<td>
								@if($gift->type == 0)
									Gift
								@elseif($gift->type == 1)
									School Item
								@endif
							</td>
							<td>
								<form  action="{{url('child/gift', [$gift->id])}}/edit">
									<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
								</form>
							</td>
							<td>
								<form action="{{url('child/gift', [$gift->id])}}" method="POST">
										{{method_field('DELETE')}}
									{{ csrf_field() }}
									<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>



			</div>

	</div>

</div>

@endsection
