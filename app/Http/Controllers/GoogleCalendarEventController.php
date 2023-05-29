<?php

namespace App\Http\Controllers;

use App\Models\GoogleCalendarEvent;
use App\Http\Requests\StoreGoogleCalendarEventRequest;
use App\Http\Requests\UpdateGoogleCalendarEventRequest;

class GoogleCalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.404');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoogleCalendarEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GoogleCalendarEvent $googleCalendarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GoogleCalendarEvent $googleCalendarEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoogleCalendarEventRequest $request, GoogleCalendarEvent $googleCalendarEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GoogleCalendarEvent $googleCalendarEvent)
    {
        //
    }
}
