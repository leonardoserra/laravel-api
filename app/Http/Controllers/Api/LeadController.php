<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'name' => 'required|max:50',
                'email' => 'required|max:100|email',
                'message' => 'nullable|max:500'

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Lead();

        $newLead->fill($data);
        $newLead->save();

        Mail::to('info@serraleonardo.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true
        ]);
    }
}
