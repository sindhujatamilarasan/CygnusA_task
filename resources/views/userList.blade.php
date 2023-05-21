@extends('layouts.home')
@section('content')
<div class="card-body">
  <table id="userList" class="cell-border" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($people as $data)
      <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>
          <a href="{{ route('createContact',$data->person_id) }}" class="btn btn-secondary btn-sm mr-2" href="#" role="button"><i class="fa fa-phone"></i> Add Contact</a>
          <a href="{{ route('userView',$data->person_id) }}" class="view mr-2" title="View User Details" data-toggle="tooltip"><i class="fa  fa-eye fa-lg" aria-hidden="true"></i></a>
          <a href="{{ route('editUser',$data->person_id) }}" class="edit mr-2" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
          <a href="{{  route('deleteUser',$data->person_id) }}" class="delete " onclick="return confirm('Are you sure want to delete ?');" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red"></i>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
@section('title')
    User List
@endsection