@extends('layout')

@section('content')
<h3>Your Thought Of The Day?</h3>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<form action="{{asset('/todos/create')}}" method="POST">
			{{ csrf_field() }}
			<input type="text" class="form-control" name="todo" placeholder="Submit Your Thoughts.."><br>
			<button type="submit" class="btn btn-normal">Submit</button>
		</form>
	</div>
</div>

<hr>
@foreach($todos as $todo)

{{ $todo->todo }}

<br>
<a href="{{ route('todo.update', ['id'=>$todo->id])}}" class="btn btn-info">
	Update
</a>
<a href="{{ route('todo.delete', ['id'=>$todo->id])}}" class="btn btn-danger">
	Delete
</a>
@if(!$todo->completed)
	
		<a href="{{ route('todo.completed',['id'=>$todo->id]) }}" class="btn btn-success">Completed???</a>
		
@endif



<hr>

@endforeach

@stop