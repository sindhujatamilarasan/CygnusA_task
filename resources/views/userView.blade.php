@extends('layouts.home')
@section('content')
<div class="card mt-5">
    <div class="card-header text-right font-weight-bold">
        <a href="{{ route('createContact',$people->person_id) }}" class="btn btn-secondary btn-sm mr-2" role="button"><i class="fa fa-phone"></i> Add Contact</a>
    </div>
    <div class="card-header text-center font-weight-bold">
        <h4>{{ $people->name }} - <span class="uemail">{{ $people->email }}</span></h4>
    </div>
    <div class="card-body">
        <table id="userList" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($people->contactData as $data)
                    <tr>
                        <td>{{ $data->contact_id }}</td>
                        <td>({{ $data->country_code }}){{ $data->number }}</td>
                        <td>
                            <a href="{{ route('editContact',$data->contact_id ) }}" class="edit mr-2" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                            <a href="{{  route('deleteContact',[$data->contact_id,$people->person_id]) }}" class="delete " onclick="return confirm('Are you sure want to delete ?');" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('title')
  User Details
@endsection