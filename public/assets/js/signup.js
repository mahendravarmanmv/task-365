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
  const phoneError = document.getElementById('phone-error');
  phoneError.innerText = "";

  if (!phone) {
    phoneError.innerText = "Please enter your mobile number.";
    return;
  }

  if (!/^[6-9]\d{9}$/.test(phone)) {
    phoneError.innerText = "Enter a valid 10-digit Indian mobile number starting with 6-9.";
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
      phoneError.innerText = data.message;
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

// Optional: Prevent form submission if OTP not verified
// Prevent form submission if phone or email OTP not verified
document.querySelector('form').addEventListener('submit', function (e) {
  const phoneOtpVerified = document.getElementById("otp_verified").value;
  const emailOtpVerified = document.getElementById("email_otp_verified").value;

  if (phoneOtpVerified !== "1" || emailOtpVerified !== "1") {
    e.preventDefault();
    alert("Please verify both Phone and Email OTPs before submitting the form.");
  }
});



function updateFileName(input, displayId) {
  const fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
  document.getElementById(displayId).textContent = fileName;
}


/*email otp start */
function sendemailOtp() {
    const email = document.getElementById('email').value.trim();
    const statusMessage = document.getElementById('email-status-message');
    const checkMessage = document.getElementById('email-check-message');
    const sendBtn = document.getElementById('send-otp-btn');

    // Reset messages
    statusMessage.innerHTML = '';
    checkMessage.innerHTML = '';

    if (!email) {
        checkMessage.innerHTML = "<div class='text-danger mt-1'>Please enter an email address.</div>";
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
            checkMessage.innerHTML = "<div class='text-danger mt-1'>This email is already registered.</div>";
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
            document.getElementById('email-otp-section').style.display = 'block';
            statusMessage.innerHTML = "<div class='alert alert-info mt-1'>OTP sent to your email address!</div>";
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
        $field.closest('.input-group').after('<div class="text-danger dynamic-error mt-1">' + message + '</div>');
      } else {
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
    const alternative_number = $('input[name="alternative_number"]');
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
    } else if (emailOtpVerified !== "1") {
      $("#email-otp-section").show();
      showError($('#email-otp-input'), "Please verify your email OTP.");
    }

    // Password
    if (!password.val().trim()) {
      showError(password, "Password is required.");
    }

    // Phone
const phoneVal = phone.val().trim();
$('#phone-error').text(''); // Clear previous message

if (!phoneVal) {
  $("#otp-section").hide();
  $('#phone-error').text("Mobile number is required.");
  isValid = false;
} else if (!/^[6-9]\d{9}$/.test(phoneVal)) {
  $("#otp-section").hide();
  $('#phone-error').text("Enter a valid 10-digit Indian mobile number starting with 6-9.");
  isValid = false;
} else if (phoneOtpVerified !== "1") {
  $("#otp-section").show();
  $('#phone-error').text("Please verify your phone OTP.");
  isValid = false;
}


    // Alternative Number
    const altVal = alternative_number.val().trim();
    if (!altVal) {
      showError(alternative_number, "Alternative number is required.");
    } else if (!/^[6-9]\d{9}$/.test(altVal)) {
      showError(alternative_number, "Enter a valid 10-digit Indian mobile number starting with 6-9.");
    }
    else if (phoneVal && phoneVal === altVal) {
      showError(alternative_number, "Mobile and alternative number should not be the same.");
    }


    // Category
    if (!category.val() || category.val().length === 0) {
      showError(category, "Please select at least one category.");
    }

    // Terms and Conditions
    if (!terms.is(':checked')) {
      isValid = false;
      terms.closest('.form-group').append('<div class="text-danger dynamic-error mt-1">You must agree to the Terms and Privacy Policy.</div>');
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
});

/*form validations end */

