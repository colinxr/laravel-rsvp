@extends('admin')


@section('content')

  <header>
      <h1>Event App Unknown Entries</h1>
      <div class="form-group">
        <h4>Download this List</h4>
        <form method='post' action='download.php'>
          <input type='submit' value='Export' name='Export'>
        </form>
      </div>
      <?php
        // $admin = new Admin();
				// $admin->countResults(DB_TABLE, 'rsvps');
				// $admin->countResults(DB_TABLE, 'plusOnes');
      ?>
    </header>


  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Postal</th>
        <th>Instagram</th>
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
        <td>{{ $guest->guestfirstName }} {{ $guest->guestLastName }}</td>
        <td>{{ $guest->guestEmail }}</td>
        <td>
          <form action="/admin/guest/{{ $guest->id }}/deny" method="POST">
            @csrf
            @method('PATCH')

            <button type="submit">Deny</button>
          </form>
          <form action="/admin/guest/{{ $guest->id }}/approve" method="POST">
             @csrf
             @method('PATCH')

            <button type="submit">Approve</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection