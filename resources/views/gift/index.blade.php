<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Gift</h1>
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
<div>
	<form action="{{url('/child/gift')}}" method="POST">
		{{ csrf_field() }}
		<input type="text" name="item">
		<input type="hidden" name="child_id" value="{{$child_id}}">
		<select name="type">
			<option value="0">Gift</option>
			<option value="1">School item</option>
		</select>
		<button type="submit">Add</button>
	</form>
</div>
<div>
	<table border="1">
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
					<button>Edit</button>
				</form>
			</td>
			<td>
				<form action="{{url('child/gift', [$gift->id])}}" method="POST">
   					{{method_field('DELETE')}}
					{{ csrf_field() }}
					<button>Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
</body>
</html>