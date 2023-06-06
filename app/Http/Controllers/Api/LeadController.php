<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();
        $newLead = new Lead();

        $newLead->fill($data);
        $newLead->save();
    }
}
