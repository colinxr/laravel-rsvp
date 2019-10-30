<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RsvpConfirmation;
use App\Mail\DenyUnknown;
use App\Mail\StaffNotification;
use App\Guest;
use App\Event;
use App\Invite;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Guest $guest)
    {
        $guests = Guest::approved()->get()->sortBy('updated_at');
        $guestsCount = $guests->count();
        $plusOneCount = $guests->where('guest-email', '<>', '', 'and')->count();
        return view('admin.index', compact('guests', 'guestsCount', 'plusOneCount'));
    }

    public function indexUnknowns(Guest $guest)
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
      //validate request
      // check event rsvp type
      $rsvpSettings = DB::table('event')->where('option', 'RSVP_TYPE')->first();
      $rsvpType = $rsvpSettings->value;
      
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

      if ('Closed' === $rsvpType) {
        $invited = Invite::where('email', $form['rsvp']['email'])->first();
        $guest->status = 'pending';

        if ($invited !== null) {
          $guest->status = 'approved';
          $guest->company  = $invited->company;
          $guest->guestOf  = $invited->guestOf;
          $guest->gender  = $invited->gender;
          $guest->category  = $invited->category;
          $guest->role  = $invited->role;
        }
        $guest->save();

        Mail::to('colinxr@gmail.com')->send(
          new StaffNotification($guest)
        );

        $message = 'closed';
        return redirect('/confirm', compact('message'));
      }

      if ('Open' === $rsvpType) {
        $guest->status = 'approved';
        $guest->save();

        Mail::to($guest->email)->send(
          new RsvpConfirmation($guest)
        );

        $message = 'Confirmed';
        return redirect('/confirm', compact('message'));
      }

      if ('Match' === $rsvpType) {
        // check List
        $invited = Invite::where('email', $form['rsvp']['email'])->first();
        $guest->status = 'pending';
        
        if ($invited !== null) {
          $guest->status = 'approved';
          $guest->company  = $invited->company;
          $guest->guestOf  = $invited->guestOf;
          $guest->gender  = $invited->gender;
          $guest->category  = $invited->category;
          $guest->role  = $invited->role;
        }

        $guest->save();

        if ($invited !== null) {
          Mail::to($guest->email)->send(
            new RsvpConfirmation($guest)
          );
        } else {
          Mail::to('colinxr@gmail.com')->send(
            new StaffNotification($guest)
          );
        }

        $message = $invited ? 'Confirmed' : 'Pending';
        return redirect('/confirm', compact('message'));
      }
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
        return view('admin.guest');
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
        return back();
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
      return back();
    }

    public function deny(Guest $guest)
    {
      $guest->deny();

      Mail::to($guest->email)->send(
        new DenyUnknown($guest)
      );
      $message = 'denied';
      // flash message
      return back();
    }

    public function approve(Guest $guest)
    {
      $guest->approve();

      Mail::to($guest->email)->send(
        new RsvpConfirmation($guest)
      );

      $message = 'approved';
      // flash message
      return back();
    }
}
