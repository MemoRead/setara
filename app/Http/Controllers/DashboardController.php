<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numberOfEmployees = Employee::count();
        $numberOfUsers = User::count();
        $numberOfIncomingMails = IncomingMail::count();
        $numberOfOutgoingMails = OutgoingMail::count();

        return view('dashboard.index', compact('numberOfEmployees', 'numberOfUsers', 'numberOfIncomingMails', 'numberOfOutgoingMails'));
    }
}
