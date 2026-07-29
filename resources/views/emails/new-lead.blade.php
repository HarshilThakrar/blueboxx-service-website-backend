<!DOCTYPE html>
<html>
<head>
    <title>New Lead Received</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Lead Received: {{ $lead->name }}</h2>
    <p>A new contact lead has been submitted through the website.</p>
    
    <table border="0" cellpadding="5" cellspacing="0" style="width: 100%; max-width: 600px;">
        <tr>
            <td width="30%"><strong>Name:</strong></td>
            <td>{{ $lead->name }}</td>
        </tr>
        <tr>
            <td><strong>Company:</strong></td>
            <td>{{ $lead->company ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $lead->email }}</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>{{ $lead->phone ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Service:</strong></td>
            <td>{{ $lead->service ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Budget:</strong></td>
            <td>{{ $lead->budget ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Timeline:</strong></td>
            <td>{{ $lead->timeline ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Message:</strong></td>
            <td>{{ nl2br(e($lead->message)) }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px; font-size: 12px; color: #777;">
        IP Address: {{ $lead->ip_address }}<br>
        Browser: {{ $lead->browser }}<br>
        Device: {{ $lead->device }}
    </p>
</body>
</html>
