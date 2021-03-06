@extends('admin')


@section('content')

  <header>
    <h1>App List Settings</h1>
  </header>

  <div class="wrapper">
    
    <h2>Upload a list</h2>
    <form id="js-upload-list" action="/admin/event/upload" method="POST" enctype="multipart/form-data">
      @csrf    
      {{-- @method('patch') --}}
      <label for="list">Upload CSV</label>
      <input type="file" name="list" id="">
      <button type="submit">Submit</button>
    </form>

    <h2>Change RSVP Type</h2>
    
    @if ($event_type)
      <h5>Current RSVP Type: {{ $event_type }} </h5>
    @endif
    
    <form action="/admin/event/type" method="post">
      @csrf
      @method('patch')
      <label for="RSVP_TYPE">type</label>
      <select name="RSVP_TYPE" id="rsvp_type">
        <option value="null">Select an Event Type</option>
        <option value="Open">Open RSVP</option>
        <option value="Match">Match our Guest List</option>
        <option value="Closed">Close Guest List</option>
        <option value="TK">TK</option>
      </select>
      <button type="submit">Submit</button>
    </form>
    
  </div>
@endsection