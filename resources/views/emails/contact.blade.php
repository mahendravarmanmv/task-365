<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 30px; background-color: #f4f6f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header -->
        <tr>
            <td style="background-color: #033796; padding: 25px 20px; text-align: center;">
                <h1 style="margin: 0; color: #ffffff; font-size: 22px;">📬 New Contact Form Message</h1>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 25px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="padding: 10px 0; width: 30%; font-weight: 600;">Name:</td>
                        <td style="padding: 10px 0;">{{ $author }}</td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 10px 0; font-weight: 600;">Email:</td>
                        <td style="padding: 10px 0;">{{ $email }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; font-weight: 600;">Phone:</td>
                        <td style="padding: 10px 0;">{{ $phone }}</td>
                    </tr>
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 10px 0; font-weight: 600;">Company:</td>
                        <td style="padding: 10px 0;">{{ $subject }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; vertical-align: top; font-weight: 600;">Message:</td>
                        <td style="padding: 10px 0;">{{ $comment }}</td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #f0f0f0; text-align: center; padding: 15px;">
                <p style="margin: 0; font-size: 13px; color: #777;">
                    This message was sent from contact form.
                </p>
            </td>
        </tr>
    </table>

</body>
</html>
