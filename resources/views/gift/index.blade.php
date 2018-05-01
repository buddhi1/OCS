<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<style media="screen">
	.btn-danger{

			margin-left: -320px;

	}
	.btn-primary{
		margin-left: -185px;
	}

	#btnprimary{
		margin-left: -1px;
		margin-top:	5px;
	}
	.selectClass{
		margin-top: 10px;
	}



	</style>
<body>


<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12">

				<div>
					<legend>Gift</legend>
					<form action="{{url('/child/gift')}}" method="POST">
						{{ csrf_field() }}
						<input class="form-control" type="text" name="item">
						<input class="form-control" type="hidden" name="child_id" value="{{$child_id}}">
						<select class="selectClass" name="type">
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





<div class="container">

	<div class="row">

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
									<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
								</form>
							</td>
							<td>
								<form action="{{url('child/gift', [$gift->id])}}" method="POST">
										{{method_field('DELETE')}}
									{{ csrf_field() }}
									<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>



			</div>

	</div>

</div>



</body>
</html>
