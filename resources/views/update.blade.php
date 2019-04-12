@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<form action="{{ route('todo.save', ['id' => $todo->id])}}" method="POST">
			{{ csrf_field() }}
			<input type="text" class="form-control input-md" name="todo" value="{{ $todo->todo }}" placeholder=""><br>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
</div>

@stop