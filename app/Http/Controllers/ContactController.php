<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate inputs
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'required|string|max:100',
            'message' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required'
        ]);

        // Verify reCAPTCHA
        $recaptcha = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret='
            . env('GOOGLE_RECAPTCHA_SECRET')
            . '&response=' . $data['g-recaptcha-response']
        );
        $response = json_decode($recaptcha);

        if (!$response->success) {
            return response()->json(['error' => 'Captcha verification failed.'], 422);
        }

        // Reject links or URLs
        if (preg_match('/https?:\/\//i', $data['message']) || preg_match('/www\./i', $data['message'])) {
            return response()->json(['error' => 'Links are not allowed in messages.'], 422);
        }

        // Send the email
        $to = env('MAIL_TO_ADDRESS', 'kclich@hotmail.com');
        $subject = 'New Contact Form Submission';
        $body = "
            <h2>New Contact Message</h2>
            <p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Phone:</strong> {$data['phone']}</p>
            <p><strong>Service:</strong> {$data['service']}</p>
            <p><strong>Message:</strong><br>{$data['message']}</p>
        ";

        Mail::send([], [], function ($message) use ($to, $subject, $body, $data) {
            $message->to($to)
                ->subject($subject)
                ->from($data['email'], $data['name'])
                ->setBody($body, 'text/html');
        });

        return response()->json(['success' => 'Message sent successfully!']);
    }
}
