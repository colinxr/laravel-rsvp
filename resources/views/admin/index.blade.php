@extends('admin')


@section('content')
  <header>
      <h1>Laravel TEst App Backend</h1>
      <div class="form-group">
        <h4>Download this List</h4>
        <form method='post' action='/download'>
          <input type='submit' value='Export' name='Export'>
        </form>
      </div>
      <?php
        // $admin = new Admin();
				// $admin->countResults(DB_TABLE, 'rsvps');
				// $admin->countResults(DB_TABLE, 'plusOnes');
      ?>
      <h6>{{ $guestsCount }} Guests</h6>
      <h6>{{ $plusOneCount }} Plus Ones</h6>
    </header>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Postal</th>
        <th>Instagram</th>
        <th>Gender</th>
        <th>Guest Of</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Guest Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($guests as $guest)
      <tr>
        <td>{{ $guest->id }}</td>
        <td>{{ $guest->firstName }} {{ $guest->lastName }}</td>
        <td>{{ $guest->email }}</td>
        <td>{{ $guest->postal }}</td>
        <td>{{ $guest->instagram }}</td>
        <td>{{ $guest->gender }}</td>
        <td>{{ $guest->guest_of }}</td>
        <td>{{ $guest->company }}</td>
        <td>{{ $guest['guest-firstName'] }} {{ $guest['guest-lastName'] }}</td>
        <td>{{ $guest['guest-email'] }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection