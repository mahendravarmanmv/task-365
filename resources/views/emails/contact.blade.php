<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 30px;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 20px; background-color: #033796; color: #fff; border-top-left-radius: 6px; border-top-right-radius: 6px;">
                <h2 style="margin: 0;">New Contact Form Message</h2>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="padding: 8px 0;"><strong>Name:</strong></td>
                        <td style="padding: 8px 0;">{{ $author }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Email:</strong></td>
                        <td style="padding: 8px 0;">{{ $email }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Phone:</strong></td>
                        <td style="padding: 8px 0;">{{ $phone }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Company:</strong></td>
                        <td style="padding: 8px 0;"> {{ $subject }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; vertical-align: top;"><strong>Message:</strong></td>
                        <td style="padding: 8px 0;">{{ $comment }}</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="padding: 15px; background-color: #f0f0f0; text-align: center; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
                <small style="color: #666;">This message was sent from your website contact form.</small>
            </td>
        </tr>
    </table>

</body>
</html>
