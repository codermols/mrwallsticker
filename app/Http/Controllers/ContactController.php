<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function create()
    {
    	return view('contact.create');
    }

    public function store(ContactFormRequest $request)
    {
    	$data = [
			'name' => $request->get('inputName'),
			'email' => $request->get('inputEmail'),
			'message' => $request->get('inputMessage'),
    	];

    	\Mail::send('emails.contact', $data, function($message)
    	{
			$message->from(env('MAIL_FROM'));
			$message->to(env('MAIL_FROM'), env('MAIL_NAME'));
			$message->subject('Fra MrWallstickers Kontaktformular');
    	});

    	return \Redirect::route('contact')
    		->with('message', 'Tak fordi du henvendte dig til os. Vi besvarer hurtigst muligt.');
    }
}
