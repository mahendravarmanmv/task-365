// Initialize OTPLESS SDK
const callback = (eventCallback) => {
  const ONETAP = () => {
    const { response } = eventCallback;
    const token = response.token;
    console.log("OTP Sent. Token: ", token);
  };

  const OTP_AUTO_READ = () => {
    const { response: { otp } } = eventCallback;
    console.log("OTP Auto Read: ", otp);
  };

  const FAILED = () => {
    const { response } = eventCallback;
    console.error("OTP Sending Failed: ", response);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>Failed to send OTP. Try again later.</div>";
    document.getElementById("send-otp-mobile").disabled = false;
    document.getElementById("send-otp-mobile").innerText = "Send OTP";
  };

  const FALLBACK_TRIGGERED = () => {
    const { response } = eventCallback;
    console.warn("Fallback Triggered: ", response);
  };

  const EVENTS_MAP = {
    ONETAP,
    OTP_AUTO_READ,
    FAILED,
    FALLBACK_TRIGGERED
  };

  if ("responseType" in eventCallback) EVENTS_MAP[eventCallback.responseType]();
};

const OTPlessSignin = new OTPless(callback);

// Function to request OTP
const phoneAuth = () => {
  const phoneInput = document.getElementById('phone');
  const phone = phoneInput.value.trim();
  phoneError = $("#phone").closest('.input-group');
  $("#phone-error").remove();

  if (!phone) {
	  
	$("#phone").addClass("error");
	phoneError.after('<label id="phone-error" class="error" for="mobile">Please enter your mobile number registered with WhatsApp.</label>');
    return;
  }

  if (!/^[6-9]\d{9}$/.test(phone)) {
	phoneError.after('<label id="phone-error" class="error" for="mobile">Enter a valid 10-digit Indian mobile number starting with 6-9.</label>');
    return;
  }

  fetch("/check-phone-exists", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ phone: phone })
  })
  .then(response => response.json())
  .then(data => {
    if (data.exists) {
	  phoneError.after('<label id="phone-error" class="error" for="mobile">'+data.message+'</label>');
      return;
    }

    document.getElementById("send-otp-mobile").disabled = true;
    document.getElementById("send-otp-mobile").innerText = "Sending...";
    document.getElementById("otp-section").style.display = "block";

    OTPlessSignin.initiate({
      channel: "PHONE",
      phone: phone,
      countryCode: "+91",
    }).then((res) => {
	  $("#phone").removeClass("error"); // remove red border
	  $("label[for='phone'].error").remove(); // remove error message label
      document.getElementById("status-message").innerHTML = "<div class='alert alert-info'>OTP sent to your phone number!</div>";
      document.getElementById("send-otp-mobile").innerText = "OTP Sent";
    }).catch((err) => {
      console.error("OTP Send Error: ", err);
      document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>Error: " + err.message + "</div>";
      document.getElementById("send-otp-mobile").disabled = false;
      document.getElementById("send-otp-mobile").innerText = "Send OTP";
    });
  });
};

// Function to verify OTP
const verifyOTP = () => {
  const phone = document.getElementById('phone').value.trim();
  const otp = document.getElementById('otp-input').value.trim();
  const verifyButton = document.querySelector('#otp-section button');

  if (otp.length === 0) {
    alert('Please enter OTP.');
    return;
  }

  OTPlessSignin.verify({
    channel: "PHONE",
    phone: phone,
    otp: otp,
    countryCode: "+91",
  }).then((res) => {
    if (res.success && res.response && res.response.verification === "COMPLETED") {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-success'>✅ OTP Verified Successfully!</div>";
      verifyButton.innerHTML = '<span style="color: white;">&#10004;</span> Verified';
      verifyButton.classList.remove('btn-outline-primary');
      verifyButton.classList.add('btn-success');
      verifyButton.disabled = true;
	  
	  $("#phone").removeClass("error"); // remove red border
	  $("label[for='phone'].error").remove(); // remove error message label

      document.getElementById("send-otp-mobile").innerText = "OTP Sent";
      document.getElementById("otp_verified").value = "1"; // Correctly match "accepted"
    } else {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ OTP Verification Failed. Please try again.</div>";
      document.getElementById("otp_verified").value = "0";
    }
  }).catch((err) => {
    console.error("Verification Error: ", err);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ Verification failed. Try again later.</div>";
    document.getElementById("otp_verified").value = "0";
  });
};