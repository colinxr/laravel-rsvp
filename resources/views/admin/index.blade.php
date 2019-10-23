@extends('layout')


@section('content')
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
        <td>{{ $guest->ID }}</td>
        <td>{{ $guest->firstName }} {{ $guest->lastName }}</td>
        <td>{{ $guest->email }}</td>
        <td>{{ $guest->postal }}</td>
        <td>{{ $guest->instagram }}</td>
        <td>{{ $guest->gender }}</td>
        <td>{{ $guest->guestOf }}</td>
        <td>{{ $guest->company }}</td>
        <td>{{ $guest->guestfirstName }} {{ $guest->guestLastName }}</td>
        <td>{{ $guest->guestEmail }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection