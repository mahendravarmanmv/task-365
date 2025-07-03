<!DOCTYPE html>
<html>
<body>
    <h2>Your OTP Code</h2>
    <p>Your OTP is: <strong>{{ $otp }}</strong></p>
    <p>It will expire in 5 minutes.</p>
	@include('emails.disclaimer')
</body>
</html>
