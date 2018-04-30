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
	<form action="{{url('child/gift', [$gift->id])}}" method="POST">
	    {{method_field('PATCH')}}
	    {{ csrf_field() }}
		<input type="text" name="item" value="{{$gift->item}}">
		<input type="hidden" name="child_id" value="{{$gift->child_id}}">
		<select name="type">
			<option value="0" @if($gift->type == 0) selected @endif>Gift</option>
			<option value="1" @if($gift->type == 1) selected @endif>School item</option>
		</select>
		<button type="submit">Update</button>
	</form>
</div>
</body>
</html>