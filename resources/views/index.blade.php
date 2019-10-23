@extends('layout')

@section('content')
<div class="wrapper">
    <form action="/guest" method="post">
      {{ csrf_field() }}

      <span class="input input--bfm">

        <div class="input-group">
						<input class="input__field input__field--bfm" type="text" id="first-name"  name="rsvp[first-name]" value="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required />
						<label class="input__label input__label--bfm input__label--bfm-color" for="first-name">
							<span class="input__label-content input__label-content--bfm">First Name</span>
						</label>
					</span></div>
<div class="input-group">
					<span class="input input--bfm">
						<input class="input__field input__field--bfm" type="text" id="last-name" name="rsvp[last-name]" value="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required />
						<label class="input__label input__label--bfm input__label--bfm-color" for="last-name">
							<span class="input__label-content input__label-content--bfm">Last Name</span>
						</label>
					</span></div>
<div class="input-group">
					<span class="input input--bfm">
						<input class="input__field input__field--bfm" type="email" id="email" name="rsvp[email]" value="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required />
						<label class="input__label input__label--bfm input__label--bfm-color" for="email">
							<span class="input__label-content input__label-content--bfm">Email</span>
						</label>
					</span></div>
<div class="input-group">
					<span class="input input--bfm">
						<input class="input__field input__field--bfm" type="text" id="postal"  name="rsvp[postal]" value="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required />
						<label class="input__label input__label--bfm input__label--bfm-color" for="postal">
							<span class="input__label-content input__label-content--bfm">Postal Code</span>
						</label>
					</span></div>

					<span class="input input--bfm">
						<input class="input__field input__field--bfm" type="text" id="instagram"  name="rsvp[instagram]" value="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required />
						<label class="input__label input__label--bfm input__label--bfm-color" for="instagram">
							<span class="input__label-content input__label-content--bfm">Instagram</span>
						</label>
					</span></div>
<div class="input-group">
					<span class="input input--bfm input__check">
						<label class="input__label input__label--plus-one" for="plus-one">Bringing a Guest?</label>
						<input type="checkbox" name="rsvp[plus-one]" id="plus-one">
          </span>
        </div>

					<div class="guests">
            <div>
						<span class="input input--bfm">
							<input class="input__field input__field--bfm" type="text" id="guest-firstName" name="rsvp[guest-firstName]" />
							<label class="input__label input__label--bfm input__label--bfm-color" for="guest-firstName">
								<span class="input__label-content input__label-content--bfm">Guest's First Name</span>
							</label>
						</span>

            </div>
<div class="input-group">
						<span class="input input--bfm">
							<input class="input__field input__field--bfm" type="text" id="guest-lastName" name="rsvp[guest-lastName]" />
							<label class="input__label input__label--bfm input__label--bfm-color" for="guest-lastName">
								<span class="input__label-content input__label-content--bfm">Guest's Last Name</span>
							</label>
						</span>
            </div>
<div class="input-group">
						<span class="input input--bfm">
							<input class="input__field input__field--bfm" type="email" id="guest-email" name="rsvp[guest-email]" />
							<label class="input__label input__label--bfm input__label--bfm-color" for="guest-email">
								<span class="input__label-content input__label-content--bfm">Guest's Email</span>
							</label>
						</span>
          </div>
        </div>

					<button class="btn btn-1 btn-1a" type="submit" name="rsvp[submit]" value="Submit">Submit</button>


		</form>
</div>
@endsection