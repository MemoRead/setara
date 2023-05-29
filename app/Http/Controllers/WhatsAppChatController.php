<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppChat;
use App\Http\Requests\StoreWhatsAppChatRequest;
use App\Http\Requests\UpdateWhatsAppChatRequest;

class WhatsAppChatController extends Controller
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
    public function store(StoreWhatsAppChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WhatsAppChat $whatsAppChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhatsAppChat $whatsAppChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWhatsAppChatRequest $request, WhatsAppChat $whatsAppChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhatsAppChat $whatsAppChat)
    {
        //
    }
}
