@extends('layouts.home')
@section('content')
<div class="card-body">
    <form name="add-contact-form" id="add-contact-form" method="post" action="{{route('storeContact')}}">
        @csrf
        <div class="form-group">
            <label for="code">Country Code</label>
            <select class="form-control" id="Country" name="ccode" data-live-search="true">
                <i class="fa fa-globe" aria-hidden="true"></i>
                @foreach($ccode as $key=>$value)
                <option value="{{$key}}" {{ (isset($contact->country_code) && $contact->country_code == $key) || old('ccode') == $key ? 'selected' : '' }}>{{ $value }} ( {{ $key }} )</option>
                @endforeach
            </select>
            <input type="hidden" id="id" name="id" value="{{ $contact->contact_id ?? ''}}" class="form-control">
            <input type="hidden" id="person_id" name="person_id" value="{{ $contact->person_id ?? request()->id}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->number ?? ''}}">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('title')
  @if($type == 'create')
     Add Contact
  @else
     Edit Contact
  @endif
@endsection
