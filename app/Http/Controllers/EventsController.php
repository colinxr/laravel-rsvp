<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Event;
use App\Guest;
use App\Invite;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_type = Event::where('option', 'RSVP_TYPE')->first()->value;

        return view('admin/list.index', compact('event_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('list');
        $list = $file->getRealPath();

        $csv = Reader::createFromPath($list, 'r');
        $csv->setHeaderOffset(0);
        
        $records = $csv->getRecords();

        foreach($records as $record) {
            $invite = Invite::updateOrCreate(
                ['email' => $record['EMAIL_LOWER']], 
                [
                    'firstName' => $record['FIRST_NAME'],
                    'lastName' => $record['LAST_NAME'],
                    'email' => $record['EMAIL_LOWER'],
                    'guest_of' => $record['INVITE'],
                    'company' => $record['COMPANY'],
                    'category' => $record['VIP_TYPE'],
                    'gender' => $record['SEX'],
                ]
						);
        }

        return back();
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
    public function update(Request $request)
    {  
        $event = Event::where('option', 'RSVP_TYPE')
            ->first()
            ->update(['value' => request('RSVP_TYPE')]);
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
