<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Support;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class SupportController extends Controller
{
    //

    public function messagesPage() {
        $messages = Support::orderBy('id', 'DESC')->paginate(20);

      
        return view ('dashboard.admin.supportmessages', ['messages' => $messages]);

    }

    public function supportPage() {
        return view ('dashboard.support');
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required',
            'message' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('support')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number'=> $request->phone_number,
            'message' => $request->message
        ];

        if ($request->hasFile('attachment')) {
            $file = $request->attachment;
            $fileName = time().Str::random(10).'.'.$file->extension();  
            $request->file('attachment')->move(public_path('uploads/support_attachments'), $fileName);
            $data['attachment'] = "uploads/support_attachments/$fileName"; 
        }

        Support::insert($data);

        return redirect('dash/support')->with(['success' => 'Your message has been sent successfully, we will respond appropriately']);

    }
}
