@extends('admin')


@section('content')

  <header>
    <h1>App List Settings</h1>
  </header>

  <div class="wrapper">
    
    <h2>Upload a list</h2>
    <form id="js-upload-list" action="/admin/list/upload" method="post">
      @csrf    
      @method('patch')
      <label for="list">Upload CSV</label>
      <input type="file" name="list" id="">
      <button type="submit">Submit</button>
    </form>

    <h2>change type</h2>
    <form action="/admin/list/type" method="post">
      @csrf
      @method('patch')
      <label for="event-type">type</label>
      <select name="event-type" id="event-type">
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