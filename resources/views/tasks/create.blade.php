@extends('layouts/App')
@section('content')
<H1>Create Tast</H1>
<form action="/tasks" method="POST" >
    <div class="form-group">
        @csrf
        <label for="">Description</label>
        <input type="text" class="form-control" name="description">
    </div>
    <div class='form-group'>
    <button class='btn btn-primary'>Create Task</button>
    </div>
</form>
@endsection('content')