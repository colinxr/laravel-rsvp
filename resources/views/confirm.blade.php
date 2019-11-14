@extends('layout')

@section('content')
<div class="wrapper">

	@if($errors->any())
		<div class="notification is-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
			</ul>	
		</div>
	@endif

    
  Thanks for your RSVP.
</div>
@endsection