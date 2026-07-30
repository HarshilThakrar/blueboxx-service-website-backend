<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactLeadRequest;
use App\Models\ContactLead;
use App\Models\WebsiteSetting;
use App\Mail\NewLeadNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(ContactLeadRequest $request): JsonResponse
    {
        // Get user agent details for logging
        $ip_address = $request->ip();
        $user_agent = $request->header('User-Agent');
        
        $browser = 'Unknown';
        if (preg_match('/(Chrome|Firefox|Safari|Edge|Opera)/', $user_agent, $matches)) {
            $browser = $matches[1];
        }
        
        $device = 'Desktop';
        if (preg_match('/(Mobile|Android|iPhone|iPad)/', $user_agent)) {
            $device = 'Mobile';
        }

        $validated = $request->validated();

        // Store Lead
        $lead = ContactLead::create([
            'name' => $validated['fullName'],
            'company' => $validated['companyName'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service' => $validated['service'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'timeline' => $validated['timeline'] ?? null,
            'message' => $validated['message'],
            'ip_address' => $ip_address,
            'browser' => $browser,
            'device' => $device,
        ]);

        // Send Email Notification to Admin
        // We'll queue this via the Mailable's ShouldQueue interface
        $adminEmail = WebsiteSetting::where('key', 'admin_email')->value('value') ?? 'hello@blueboxx.com';
        Mail::to($adminEmail)->send(new NewLeadNotification($lead));

        // Generate WhatsApp redirect link
        $whatsappNumber = WebsiteSetting::where('key', 'whatsapp_number')->value('value') ?? '+1234567890';
        // Ensure number has no plus or spaces
        $cleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $whatsappMessage = "Hello Blueboxx,\n\nI would like to discuss a project.\n\n" .
            "Name: {$lead->name}\n" .
            "Company: {$lead->company}\n" .
            "Phone: {$lead->phone}\n" .
            "Email: {$lead->email}\n" .
            "Required Service: {$lead->service}\n" .
            "Budget: {$lead->budget}\n" .
            "Timeline: {$lead->timeline}\n" .
            "Message: {$lead->message}";

        $encodedMessage = urlencode($whatsappMessage);
        $whatsappUrl = "https://wa.me/{$cleanNumber}?text={$encodedMessage}";

        return response()->json([
            'message' => 'Lead submitted successfully',
            'whatsapp_url' => $whatsappUrl
        ], 201);
    }
}
