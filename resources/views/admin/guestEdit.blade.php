@extends('admin')



@section('content')
  <header>
    <h1>{{ $guest->firstName . ' ' . $guest->lastName }} </h1>
    @if ($guest->status === 'pending')
      <form action="/admin/guest/{{$guest->id}}/approve" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">Approve</button>
      </form>
      <form action="/admin/guest/{{$guest->id}}/deny" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">Deny</button>
      </form>
      <br/>
    @endif
    
    <form action="/admin/guest/{{$guest->id}}/delete" method="post">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  </header>

  <main>
    <form action="/admin/guest/{{$guest->id}}/" method="post">
      @csrf
      @method('PATCH')
      <div>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="{{ $guest->firstName}}">
      </div>
      <div>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="{{ $guest->lastName}}">
      </div>
      <div>
        <label for="guest-firstName">Guest First Name</label>
        <input type="text" name="guest-firstName" id="guest-firstName" value="{{ $guest['guest-firstName']}}">
      </div>
      <div>
        <label for="guest-lastName">Guest Last Name</label>
        <input type="text" name="guest-lastName" id="guest-lastName" value="{{ $guest['guest-lastName'] }}">
      </div>
      <div>
        <label for="guest-email">Guest Email</label>
        <input type="text" name="guest-email" id="guest-email" value="{{ $guest['guest-email'] }}">
      </div>
      <button type="submit">Update Guest</button>
    </form>
  </main>

@endsection