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
    console.log("Failed Response: ", response);
  };

  const FALLBACK_TRIGGERED = () => {
    const { response } = eventCallback;
    console.log("Fallback Triggered: ", response);
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
  const phone = document.getElementById('phone').value.trim();
  if (!phone) {
    alert("Please enter your mobile number.");
    return;
  }

  // Disable the Send OTP button and change text
  document.getElementById("send-otp-btn").disabled = true;
  document.getElementById("send-otp-btn").innerText = "Sending...";

  // Hide the mobile input section and show OTP input section
  //document.getElementById("mobile-section").style.display = "none";
  document.getElementById("otp-section").style.display = "block";

  OTPlessSignin.initiate({
    channel: "PHONE",
    phone: phone,
    countryCode: "+91",  // India
  }).then((res) => {
    console.log("OTP Sent Response: ", res);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-info'>OTP sent to your phone number!</div>";
  }).catch((err) => {
    console.log("Error while sending OTP: ", err);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>Error: " + err.message + "</div>";
    // Re-enable the button if there's an error
    document.getElementById("send-otp-btn").disabled = false;
    document.getElementById("send-otp-btn").innerText = "Send OTP";
  });
};

// Function to verify OTP
const verifyOTP = () => {
  const phone = document.getElementById('phone').value.trim();
  const otp = document.getElementById('otp-input').value.trim();
  const verifyButton = document.querySelector('#otp-section button'); // Get the Verify OTP button

  if (otp.length === 0) {
    alert('Please enter OTP.');
    return;
  }

  // Calling the OTP verification method with correct parameters
  OTPlessSignin.verify({
    channel: "PHONE",
    phone: phone,
    otp: otp,
    countryCode: "+91", // India
  }).then((res) => {
    console.log("Verification Response: ", res);

    // Updated checking based on your provided response
    if (res.success && res.response && res.response.verification === "COMPLETED") {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-success'>✅ OTP Verified Successfully!</div>";

      // Change button to "Verified" with white tick and green button
      verifyButton.innerHTML = '<span style="color: white;">&#10004;</span> Verified'; // ✔ symbol in white
      verifyButton.classList.remove('btn-outline-primary');
      verifyButton.classList.add('btn-success');
      verifyButton.disabled = true; // Optional: disable button after success
      document.getElementById("send-otp-btn").innerText = "OTP Sent";
    } else {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ OTP Verification Failed. Please check the OTP and try again.</div>";
    }
  }).catch((err) => {
    console.log("Error while verifying OTP: ", err);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ Error occurred while verifying OTP.</div>";
  });
};

function updateFileName(input, displayId) {
  const fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
  document.getElementById(displayId).textContent = fileName;
}
