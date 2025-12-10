<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

Route::post('/ajax-send-message', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Send the email
    Mail::send([], [], function ($message) use ($validatedData) {
        $message->to('recipient-email@example.com') // Replace with your email
            ->subject($validatedData['subject'])
            ->setBody(
                "You have received a new message from {$validatedData['name']} ({$validatedData['email']}):\n\n{$validatedData['message']}",
                'text/plain'
            );
    });

    return response()->json(['success' => 'Message sent successfully!']);
})->name('ajax.send.message');
