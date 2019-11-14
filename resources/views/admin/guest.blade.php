@extends('admin')



@section('content')
  <header>
    <h1>{{ $guest->firstName . ' ' . $guest->lastName }} </h1>
    @if ($guest->status === 'pending')
      <a href="/admin/guest/{{$guest->id }}/approve">Approve</a> 
      <a href="/admin/guest/{{$guest->id}}/Deny">Deny</a>  
      <br/>
    @endif
    
    <a href="/admin/guest/{{$guest->id}}/edit">Edit</a> 
    <a href="/admin/guest/{{$guest->id}}/delete">Delete</a>
  </header>


@endsection