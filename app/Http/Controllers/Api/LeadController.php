<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();
        $newLead = new Lead();

        $newLead->fill($data);
        $newLead->save();

        Mail::to('leonius92@gmail.com')->send(new NewContact($newLead));
    }
}
