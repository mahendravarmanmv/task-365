let resendPhoneInterval;
let lastPhoneSent = "";

// Start Resend Timer
function startResendPhoneTimer(duration = 60) {
    let time = duration;
    const sendBtn = document.getElementById('send-otp-mobile');
    const timerText = document.getElementById('resend-timer-phone');

    timerText.textContent = `Resend in ${time}s`;

    clearInterval(resendPhoneInterval);
    resendPhoneInterval = setInterval(() => {
        time--;
        if (time <= 0) {
            clearInterval(resendPhoneInterval);
            timerText.textContent = '';
            sendBtn.disabled = false;
            sendBtn.innerText = 'Resend OTP';
        } else {
            timerText.textContent = `Resend in ${time}s`;
        }
    }, 1000);
}

// On phone change
function handlePhoneChange() {
    const currentPhone = document.getElementById('phone').value.trim();
    if (currentPhone !== lastPhoneSent) {
        clearInterval(resendPhoneInterval);
        document.getElementById('resend-timer-phone').textContent = '';

        const sendBtn = document.getElementById('send-otp-mobile');
        sendBtn.disabled = false;
        sendBtn.innerText = 'Send OTP';

        document.getElementById('otp-section').style.display = 'none';
        document.getElementById('status-message').innerHTML = '';
    }
}

// 👉 SEND SMS OTP
const phoneAuth = () => {
    const phoneInput = document.getElementById('phone');
    const phone = phoneInput.value.trim();
    phoneError = $("#phone").closest('.input-group');
    $("#phone-error").remove();

    // Validation
    if (!phone) {
        $("#phone").addClass("error");
        phoneError.after('<label id="phone-error" class="error" for="phone">Please enter your mobile number.</label>');
        return;
    }

    if (!/^[6-9]\d{9}$/.test(phone)) {
        phoneError.after('<label id="phone-error" class="error" for="phone">Enter a valid 10-digit Indian mobile number.</label>');
        return;
    }

    // Check if phone already exists
    fetch("/check-phone-exists", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ phone })
    })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                $("#phone-error").remove();
                $("#phone").addClass("error");
                phoneError.after('<label id="phone-error" class="error" for="phone">' + data.message + '</label>');
                return;
            }

            // Begin sending SMS OTP
            document.getElementById("send-otp-mobile").disabled = true;
            document.getElementById("send-otp-mobile").innerText = "Sending...";
            document.getElementById("otp-section").style.display = "block";

            fetch("/send-sms-otp", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ phone })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        $("#phone").removeClass("error");
                        $("label[for='phone'].error").remove();

                        document.getElementById("status-message").innerHTML =
                            "<div class='alert alert-info'>OTP sent via SMS!</div>";

                        document.getElementById("send-otp-mobile").innerText = "OTP Sent";
                        lastPhoneSent = phone;
                        startResendPhoneTimer();
                    } else {
                        document.getElementById("status-message").innerHTML =
                            "<div class='alert alert-danger'>Failed: " + data.message + "</div>";
                        document.getElementById("send-otp-mobile").disabled = false;
                        document.getElementById("send-otp-mobile").innerText = "Send OTP";
                    }
                })
                .catch(err => {
                    document.getElementById("status-message").innerHTML =
                        "<div class='alert alert-danger'>Error sending OTP</div>";
                    document.getElementById("send-otp-mobile").disabled = false;
                    document.getElementById("send-otp-mobile").innerText = "Send OTP";
                });
        });
};

// 👉 VERIFY SMS OTP
const verifyOTP = () => {
    const phone = document.getElementById('phone').value.trim();
    const otp = document.getElementById('otp-input').value.trim();
    const verifyButton = document.querySelector('#otp-section button');

    if (!otp) {
        alert('Please enter OTP.');
        return;
    }

    fetch("/verify-sms-otp", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ phone, otp })
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("status-message").innerHTML =
                    "<div class='alert alert-success'>✅ OTP Verified Successfully!</div>";

                verifyButton.innerHTML = '<span style="color:white;">&#10004;</span> Verified';
                verifyButton.classList.remove('btn-outline-primary');
                verifyButton.classList.add('btn-success');
                verifyButton.disabled = true;

                clearInterval(resendPhoneInterval);
                document.getElementById('resend-timer-phone').textContent = '';

                document.getElementById("otp_verified").value = "1";
            } else {
                document.getElementById("status-message").innerHTML =
                    "<div class='alert alert-danger'>❌ Invalid OTP</div>";
                document.getElementById("otp_verified").value = "0";
            }
        })
        .catch(err => {
            document.getElementById("status-message").innerHTML =
                "<div class='alert alert-danger'>❌ Server error, try again</div>";
            document.getElementById("otp_verified").value = "0";
        });
};
