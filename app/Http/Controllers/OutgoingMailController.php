<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OutgoingMail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreOutgoingMailRequest;
use App\Http\Requests\UpdateOutgoingMailRequest;

class OutgoingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mailbox.outgoing-mails', [
            'mails' => OutgoingMail::with('employee')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mailbox.create-outgoing-mail', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutgoingMailRequest $request)
    {
        $validatedData = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'receiver' => 'required',
            'content' => 'required',
            'subject' => 'required',
            'employee_id' => 'required|exists:employees,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();

            $outgoingMail = new OutgoingMail();
            $outgoingMail->number = $validatedData['number'];
            $number = $outgoingMail->number; // Get the number from the database column

            $fileName = $number . '_' . time() . '.' . $extension;
            $filePath = $file->storeAs('files', $fileName);
            
            $validatedData['file'] = 'files/' . $fileName;
        }
    
        // Save the incoming mail record to the database
        OutgoingMail::create($validatedData);
    
        return redirect('/dashboard/mails/outgoing-mails')->with('success', 'Outgoing mail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OutgoingMail $outgoingMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutgoingMail $outgoingMail)
    {
        return view('dashboard.mailbox.edit-outgoing-mail', [
            'mail' => $outgoingMail,
            'employees' => Employee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutgoingMailRequest $request, OutgoingMail $outgoingMail)
    {
        $rules = [
            'date' => 'nullable|date',
            'sender' => 'nullable',
            'content' => 'nullable',
            'receiver' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    
        if ($request->input('number') != $outgoingMail->number) {
            $rules['number'] = 'required|unique:incoming_mails,number,' . $outgoingMail->id;
        }
    
        $validatedData = $request->validate($rules);
    
        if ($request->hasFile('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
    
            $fileName = $outgoingMail->number . '_' . time() . '.' . $extension;
            $filePath = $file->storeAs('files', $fileName);
    
            $validatedData['file'] = 'files/' . $fileName;
        } else {
            unset($validatedData['file']);
        }
    
        try {
            $outgoingMail->update($validatedData);
    
            return redirect()->route('outgoing-mails.index')
                ->with('success', 'Outgoing mail updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Failed to update OutgoingMails data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutgoingMail $outgoingMail)
    {
        if($outgoingMail->file) {
            Storage::delete($outgoingMail->file);
        }

        OutgoingMail::destroy($outgoingMail->id);

        return redirect('/dashboard/mails/outgoing-mails')->with('success', 'ougoingMails data has been deleted successfully.');
    }
}
