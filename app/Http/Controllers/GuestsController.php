<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RsvpConfirmation;
use App\Mail\DenyUnknown;
use App\Guest;
use App\GuestList;
use App\Unknown;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Guest $guest)
    {
        $guests = Guest::approved()->get();

        $guestsCount = $guests->count();
        $plusOneCount = $guests->where('guest-email', '<>', '', 'and')->count();
        
        return view('admin.index', compact('guests', 'guestsCount', 'plusOneCount'));
    }

    public function showUnknowns(Guest $guest)
    {
      $guests = Guest::unknown()->get();

      return view('admin.unknown.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
			$form = request(['rsvp']);

			// check event rsvp type
			// check List
			//$invited = GuestList::where('email', $form['rsvp']['email']);
			$invited = true;

			// if on list create Guest
					// pull in extra info
			// else create Unknown
      // send correct confirmation message test to confirmation screen.
      
      $guest = new Guest;
      $guest->firstName       = $form['rsvp']['first-name'];
      $guest->lastName        = $form['rsvp']['last-name'];
      $guest->email           = $form['rsvp']['email'];
      $guest->postal          = $form['rsvp']['postal'];
      $guest->instagram       = $form['rsvp']['instagram'];
      $guest->hasPlusOne      = $form['rsvp']['plus-one'];
      $guest->guest_firstName = $form['rsvp']['guest-firstName'];
      $guest->guest_lastName  = $form['rsvp']['guest-lastName'];
      $guest->guest_email     = $form['rsvp']['guest-email'];
      $guest->status          = $invited ? 'approved' : 'pending';
      $guest->save();

      Mail::to($guest->email)->send(
        new RsvpConfirmation($guest)
      );

      $message = $invited ? 'Confirmed' : 'Pending';
			return redirect('/confirm', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $guest->update([$request]);
        $message = 'success';
        return redirect('admin.unknown.index', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest, $id)
    {
      Guest::find($id)->delete();
      $message = 'delete';
      // flash message

      return redirect('admin.unknown.index', compact('message'));
    }

    public function deny(Guest $guest, $id)
    {
      $guest = Guest::find($id);
      $guest->update(['status' => 'denied']);

      Mail::to($guest->email)->send(
        new DenyUnknown($guest)
      );
      $message = 'denied';
      // flash message

      return redirect('/admin/unknown');
    }

    public function approve(Guest $guest, $id)
    {
      $guest = Guest::find($id);

      $guest->update(['status' => 'approved']);
      
      Mail::to($guest->email)->send(
        new RsvpConfirmation($guest)
      );
      $message = 'approved';
      // flash message

      return redirect('/admin/unknown');
    }
}
