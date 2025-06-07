
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

  document.getElementById("send-otp-btn").disabled = true;
  document.getElementById("send-otp-btn").innerText = "Sending...";

  document.getElementById("otp-section").style.display = "block";

  OTPlessSignin.initiate({
    channel: "PHONE",
    phone: phone,
    countryCode: "+91",  // India
  }).then((res) => {
    console.log("OTP Sent Response: ", res);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-info'>OTP sent to your phone number!</div>";
    document.getElementById("send-otp-btn").innerText = "OTP Sent";
  }).catch((err) => {
    console.log("Error while sending OTP: ", err);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>Error: " + err.message + "</div>";
    document.getElementById("send-otp-btn").disabled = false;
    document.getElementById("send-otp-btn").innerText = "Send OTP";
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
    console.log("Verification Response: ", res);

    if (res.success && res.response && res.response.verification === "COMPLETED") {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-success'>✅ OTP Verified Successfully!</div>";
      verifyButton.innerHTML = '<span style="color: white;">&#10004;</span> Verified';
      verifyButton.classList.remove('btn-outline-primary');
      verifyButton.classList.add('btn-success');
      verifyButton.disabled = true;

      document.getElementById("send-otp-btn").innerText = "OTP Sent";
      document.getElementById("otp_verified").value = "1"; // ✅ Mark as verified
    } else {
      document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ OTP Verification Failed. Please check the OTP and try again.</div>";
      document.getElementById("otp_verified").value = "0"; // ❌ Not verified
    }
  }).catch((err) => {
    console.log("Error while verifying OTP: ", err);
    document.getElementById("status-message").innerHTML = "<div class='alert alert-danger'>❌ Error occurred while verifying OTP.</div>";
    document.getElementById("otp_verified").value = "0"; // ❌ Not verified
  });
};

// Optional: Prevent form submission if OTP not verified
document.querySelector('form').addEventListener('submit', function (e) {
  const otpVerified = document.getElementById("otp_verified").value;
  if (otpVerified !== "1") {
    //e.preventDefault();
    //alert("Please verify your OTP before submitting the form.");
  }
});



function updateFileName(input, displayId) {
  const fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
  document.getElementById(displayId).textContent = fileName;
}


/*email otp start */
function sendemailOtp() {
    const email = document.getElementById('email').value.trim();

    if (!email) {
        alert("Please enter an email.");
        return;
    }

    const sendBtn = document.getElementById('send-otp-btn');
    const statusMessage = document.getElementById('email-status-message');

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
        document.getElementById('email-otp-section').style.display = 'block';
        statusMessage.innerHTML = "<div class='alert alert-info'>OTP sent to your email address!</div>";
    })
    .catch(err => {
        console.error(err);
        sendBtn.disabled = false;
        sendBtn.innerText = "Send OTP";
        statusMessage.innerHTML = "<div class='alert alert-danger'>Failed to send OTP</div>";
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

/*form validations start */
$(document).ready(function () {
  $('form').on('submit', function (e) {
    $('.text-danger.dynamic-error').remove(); // Remove previous messages

    let isValid = true;

    // Helper to show error below a field
    function showError(selector, message) {
    const $field = $(selector);

    if ($field.closest('.input-group').length > 0) {
        // If inside .input-group, append after its parent
        $field.closest('.input-group').after('<div class="text-danger dynamic-error mt-1">' + message + '</div>');
    } else {
        // Regular field
        $field.after('<div class="text-danger dynamic-error mt-1">' + message + '</div>');
    }

    isValid = false;
}


    const name = $('input[name="name"]');
    const email = $('#email');
    const emailOtpVerified = $('#email_otp_verified').val();
    const password = $('input[name="password"]');
    const phone = $('#phone');
    const phoneOtpVerified = $('#otp_verified').val();
    const whatsapp = $('input[name="whatsapp_number"]');
    const category = $('select[name="category[]"]');
    const terms = $('#agree_terms');

    // Name
    if (!name.val().trim()) {
      showError(name, "Name is required.");
    }

    // Email
    const emailVal = email.val().trim();
    if (!emailVal) {
      $("#email-otp-section").hide();
      showError(email, "Email is required.");
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
      $("#email-otp-section").hide();
      showError(email, "Enter a valid email address.");
    }
    else if (emailOtpVerified !== "1"){
      $("#email-otp-section").show();
      showError($('#email-otp-input'), "Please verify your email OTP.");
    }    

    // Password
    if (!password.val().trim()) {
      showError(password, "Password is required.");
    }

    // Phone
    const phoneVal = phone.val().trim();
    if (!phoneVal) {
      $("#otp-section").hide();
      showError(phone, "Mobile number is required.");
    } else if (!/^\d{10}$/.test(phoneVal)) {
      $("#otp-section").hide();
      showError(phone, "Enter a valid 10-digit mobile number.");
    } else if (phoneOtpVerified !== "1") {
      $("#otp-section").show();
      showError($('#otp-input'), "Please verify your phone OTP.");
    }  

    // WhatsApp
    if (!whatsapp.val().trim()) {
      showError(whatsapp, "WhatsApp number is required.");
    }

    // Category
    if (!category.val() || category.val().length === 0) {
      showError(category, "Please select at least one category.");
    }

    // Agree to terms
    if (!$('#agree_terms').is(':checked')) {
      isValid = false;
      $('#agree_terms').closest('.form-group').append('<div class="text-danger dynamic-error mt-1">You must agree to the Terms and Privacy Policy.</div>');
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
});
/*form validations end */

