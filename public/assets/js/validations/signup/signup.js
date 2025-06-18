$(document).ready(function () {

    // Custom validator for file upload
    $.validator.addMethod("fileRequired", function (value, element) {
        return element.files.length > 0;
    }, "This field is required.");

    // Custom validator for Indian mobile numbers
    $.validator.addMethod("indianMobile", function (value, element) {
        return this.optional(element) || /^[6-9]\d{9}$/.test(value);
    }, "Enter a valid 10-digit mobile number starting with 6-90.");
	
	// Custom validator for checking if a hidden field equals 1 for email
	/*$.validator.addMethod("emailOtpVerified", function (value, element) {
    const btnText = document.getElementById('send-otp-email').innerText.trim();
    return btnText === "OTP Sent";
	}, 'Kindly click on "Send OTP" to proceed with email verification.');*/	
	
	$.validator.addMethod("emailOtpVerified", function (value, element) {
    return $("#email_otp_verified").val() == "1";
	}, "Please verify your email OTP.");
	
	// Custom validator for checking if a hidden field equals 1 for mobile
	/*$.validator.addMethod("mobileOtpVerified", function (value, element) {
    const buttonText = document.getElementById('send-otp-mobile').innerText.trim();
    return buttonText === "OTP Sent";
	}, 'Kindly click on "Send OTP" to proceed with mobile verification.');*/
	
	$.validator.addMethod("mobileOtpVerified", function (value, element) {
    return $("#otp_verified").val() == "1";
	}, "Please verify your phone OTP.");
	
	//mobile and alternatvie number should not be same
	$.validator.addMethod("notEqualToField", function (value, element, param) {
    return this.optional(element) || value !== $(param).val();
	}, "Alternative number should not be same as mobile number.");
	
	// Custom method for file size
    $.validator.addMethod("filesize", function (value, element, param) {
        if (element.files.length == 0) return false; // Required
        return element.files[0].size <= param;
    }, "File size must be less than 2MB.");


    // Main validation
    $('#signupform').validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
				emailOtpVerified: true
            },
			
            password: {
                required: true,
                minlength: 8
            },
            phone: {
                required: true,
                indianMobile: true,
				mobileOtpVerified: true
            },
            'otp-input': {
                required: function () {
                    return $('#otp_verified').val() != '1';
                }
            },
            alternative_number: {
                indianMobile: true,
                minlength: 10,
                maxlength: 10,
				notEqualToField: "#phone"
            },
            'category[]': {
                required: true
            },
            business_proof: {                
                extension: "pdf,jpg,jpeg,png",
				filesize: 2097152 // 2 MB
            },
            identity_proof: {                
                extension: "pdf,jpg,jpeg,png",
                filesize: 2097152
            },
            agree_terms: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters",
                maxlength: "Name can't be more than 50 characters"
            },
            email: {
                required: "Please enter your email",
                email: "Enter a valid email address"
            },
			email_otp_verified: {
                emailOtpVerified: "Please verify the OTP sent to your email"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters"
            },
            phone: {
                required: "Please enter your mobile number registered with WhatsApp."
            },
            'email-otp-input': {
                required: "Please enter the email OTP"
            },
            'otp-input': {
                required: "Please enter the phone OTP"
            },
            'category[]': {
                required: "Please select at least one category"
            },
            business_proof: {
                extension: "Only pdf, jpg, jpeg or png allowed"
            },
            identity_proof: {
                extension: "Only pdf, jpg, jpeg or png allowed"
            },
            agree_terms: {
                required: "You must agree to the Terms and Privacy Policy."
            }
        },
		errorPlacement: function (error, element) {
			if (element.attr("type") === "checkbox") {
			error.insertAfter(element.closest('.form-group'));
			} else if (element.closest('.input-group').length) {
			error.insertAfter(element.closest('.input-group'));
			} else {
			error.insertAfter(element);
			}
		},
        submitHandler: function (form) {
            $('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Signing Up...');
            form.submit();
        }
    });

});

// Optional: Prevent form submission if OTP not verified
// Prevent form submission if phone or email OTP not verified
document.querySelector('form').addEventListener('submit', function (e) {
  const phoneOtpVerified = document.getElementById("otp_verified").value;
  const emailOtpVerified = document.getElementById("email_otp_verified").value;

  if (phoneOtpVerified !== "1" || emailOtpVerified !== "1") {
    e.preventDefault();
	toastr.options.positionClass = 'toast-top-right';
	toastr.options.preventDuplicates = true;
	toastr.error("Please verify both Phone and Email OTPs before submitting the form.");
  }
});

function updateFileName(input, displayId) {
    if (input.files.length > 0) {
        const file = input.files[0];
        const fileName = file.name;
        const fileType = file.type;
        const fileSize = file.size;
        const fileSizeKB = (fileSize / 1024).toFixed(2);
        const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'];
        const maxSizeBytes = 2 * 1024 * 1024; // 2MB

        // Toastr config (optional, you can customize this once globally)
        toastr.options = {
            "positionClass": "toast-top-right",
            "preventDuplicates": true
        };

        // File type validation
        if (!allowedTypes.includes(fileType)) {
            toastr.error("Invalid file type. Only PDF, JPG, JPEG, and PNG are allowed.");
            input.value = ""; // Clear invalid file
            document.getElementById(displayId).textContent = "";
            return;
        }

        // File size validation
        if (fileSize > maxSizeBytes) {
            toastr.error("File size exceeds 2MB. Please upload a smaller file.");
            input.value = ""; // Clear invalid file
            document.getElementById(displayId).textContent = "";
            return;
        }

        // If valid
        document.getElementById(displayId).textContent = fileName;
        toastr.success(`File Selected: ${fileName} (${fileSizeKB} KB)`);
    } else {
        document.getElementById(displayId).textContent = "No file chosen";
    }
}
