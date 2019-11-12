<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Guest;
use App\Mail\RsvpConfirmation;
use App\Mail\DenyUnknown;

class UnknownGuestsController extends Controller
{
    //
    public function index() 
    {
        $guests = Guest::unknown()->get();
        return view('admin.unknown.index', compact('guests'));
    }

    public function edit(Guest $guest)
    {
        return view('admin.guest', compact($guest));
    }

    public function update(Request $request, Guest $guest)
    {
        $guest->update([$request]);
        $message = 'success';
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
