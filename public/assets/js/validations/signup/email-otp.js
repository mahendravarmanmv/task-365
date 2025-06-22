/*email otp start */
let resendInterval;
let lastEmailSent = ""; // Track last email OTP was sent to

function startResendTimer(duration = 60) {
    let time = duration;
    const resendBtn = document.getElementById('send-otp-email');
    const timerText = document.getElementById('resend-timer');

    //resendBtn.classList.add('d-none'); // hide initially
    timerText.textContent = `Resend in ${time}s`;

    clearInterval(resendInterval);
    resendInterval = setInterval(() => {
        time--;
        if (time <= 0) {
            clearInterval(resendInterval);
            timerText.textContent = '';            
            //resendBtn.classList.remove('d-none');
            resendBtn.innerText = 'Resend OTP';
            resendBtn.disabled = false;
        } else {
            timerText.textContent = `Resend in ${time}s`;
        }
    }, 1000);
}

function handleEmailChange() {
    const currentEmail = document.getElementById('email').value.trim();
    if (currentEmail !== lastEmailSent) {
        // Reset resend controls
        clearInterval(resendInterval);
        document.getElementById('resend-timer').textContent = '';
        //document.getElementById('resend-otp-email').classList.add('d-none');

        // Allow Send OTP again for new email
        const sendBtn = document.getElementById('send-otp-email');
        sendBtn.disabled = false;
        sendBtn.innerText = 'Send OTP';

        // Hide OTP section
        document.getElementById('email-otp-section').style.display = 'none';
        document.getElementById('email-status-message').innerHTML = '';
    }
}



function sendemailOtp() {
    const email = document.getElementById('email').value.trim();
    const statusMessage = document.getElementById('email-status-message');
    //const checkMessage = document.getElementById('email-check-message');
    const sendBtn = document.getElementById('send-otp-email');
	emailError = $("#email").closest('.input-group');
	$("#email-error").remove();

    // Reset messages
    statusMessage.innerHTML = '';
    //checkMessage.innerHTML = '';

    if (!email) {
		$("#email").addClass("error");
		emailError.after('<label id="email-error" class="error" for="email">Please enter your email</label>');
        //checkMessage.innerHTML = "<div class='text-danger mt-1'>Please enter an email address.</div>";
        return;
    }

    // First: Check if email already exists
    fetch('/check-email-exists', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ email: email })
    })
    .then(res => res.json())
    .then(data => {
        if (data.exists) {
			$("#email-error").remove();
			$("#email").addClass("error");
			emailError.after('<label id="email-error" class="error" for="email">This email is already registered.</label>');
            //checkMessage.innerHTML = "<div class='text-danger mt-1'>This email is already registered.</div>";
            return; // Stop here
        }

        // Proceed to send OTP
        sendBtn.disabled = true;
        sendBtn.innerText = "Sending...";

        fetch('/send-otp-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ email: email })
        })
        .then(res => res.json())
        .then(data => {
            sendBtn.innerText = "OTP Sent";			
			$("#email").removeClass("error"); // remove red border
			$("label[for='email'].error").remove(); // remove error message label			
            document.getElementById('email-otp-section').style.display = 'block';
            statusMessage.innerHTML = "<div class='alert alert-info mt-1'>OTP sent to your email address!</div>";
            lastEmailSent = email; // Save email that OTP was sent to
            startResendTimer();    // Start 60s timer
        })
        .catch(err => {
            console.error(err);
            sendBtn.disabled = false;
            sendBtn.innerText = "Send OTP";
            statusMessage.innerHTML = "<div class='alert alert-danger mt-1'>Failed to send OTP</div>";
        });
    })
    .catch(err => {
        console.error(err);
        checkMessage.innerHTML = "<div class='text-danger mt-1'>Error checking email. Please try again.</div>";
    });
}

function emailverifyOtp() {
    const email = document.getElementById('email').value.trim();
    const otp = document.getElementById('email-otp-input').value.trim();
    const verifyBtn = document.getElementById('verify-email-otp-btn');
    const statusMessage = document.getElementById('email-status-message');

    if (!otp) {
        alert("Please enter OTP.");
        return;
    }

    fetch('/verify-otp-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ email: email, otp: otp })
    })
    .then(res => res.json())
    .then(data => {
        if (data.message === "OTP Verified Successfully") {
            statusMessage.innerHTML = "<div class='alert alert-success'>✅ OTP Verified Successfully!</div>";
            verifyBtn.innerHTML = '<span style="color: white;">&#10004;</span> Verified';
            verifyBtn.classList.remove('btn-outline-primary');
            verifyBtn.classList.add('btn-success');
            verifyBtn.disabled = true;
            document.getElementById("email_otp_verified").value = "1";
			
			$("#email").removeClass("error"); // remove red border
			$("label[for='email'].error").remove(); // remove error message label
			
        } else {
            statusMessage.innerHTML = "<div class='alert alert-danger'>❌ " + data.message + "</div>";
            document.getElementById("email_otp_verified").value = "0";
        }
    })
    .catch(err => {
        console.error(err);
        statusMessage.innerHTML = "<div class='alert alert-danger'>❌ Error verifying OTP.</div>";
        document.getElementById("email_otp_verified").value = "0";
    });
}
/*email otp end */