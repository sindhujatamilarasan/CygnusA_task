@extends('layouts.home')
@section('content')
<div class="card-body">
  <form name="add-user-form" id="add-user-form" method="post" action="{{route('storeUser')}}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" id="name" name="username" class="form-control" value="{{ $people->name ?? ''}}">
      <input type="hidden" id="id" name="id" value="{{ $people->person_id ?? ''}}" class="form-control">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email Id</label>
      <input type="text" id="email" name="email" class="form-control" value="{{ $people->email ?? ''}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
@endsection
@section('title')
  @if($type == 'create')
    Add User
  @else
     Edit User
  @endif
@endsection