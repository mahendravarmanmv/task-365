@extends('layouts.app-home')

@section('content')

@include('common.login-form')

<!-- Page Header Start -->

    <div class="container text-center text-white">
        <h3 class="mb-2">Refund Policy</h3>
    </div>

<!-- Page Header End -->

<!-- Refund Policy Content Start -->
<section class="py-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="mb-4 shadow-sm p-4">
                    <h2 class="h4 mb-3">Task365 Refund Policy</h2>
                    <p>At Task365, we are committed to providing high-quality, verified leads to help grow your business. We understand that lead generation is a critical investment, and your satisfaction is important to us. However, due to the nature of digital products and services, we follow a fair-use refund policy as outlined below.</p>
                    <hr>

                    <h3 class="h5 text-success mt-4">✅ Eligibility for Refund</h3>
                    <p>Refunds will be considered only under the following conditions:</p>
                    <ol class="ps-3">
                        <li>
                            <strong>Invalid Leads:</strong>
                            <ul class="ps-4">
                                <li>The lead's contact number or email is permanently unreachable.</li>
                                <li>The lead information (name, business, or requirement) is clearly fake or incorrect.</li>
                                <li>Duplicate leads received within the same batch.</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Timely Reporting:</strong>
                            <ul class="ps-4">
                                <li>Any issues must be reported within 72 hours of lead delivery.</li>
                                <li>Proof of invalidity (e.g., call recording, email bounce-back, screenshots) must be submitted for review.</li>
                            </ul>
                        </li>
                    </ol>
                    <hr>

                    <h3 class="h5 text-danger mt-4">❌ Non-Refundable Cases</h3>
                    <p>Refunds will not be provided for the following:</p>
                    <ul class="ps-3">
                        <li>Leads that are not interested in your product/service.</li>
                        <li>Leads who refused the offer or stopped responding after the first contact.</li>
                        <li>Delayed response or lack of follow-up from the customer's side.</li>
                        <li>Leads used outside the scope of the agreed product/service.</li>
                    </ul>
                    <hr>

                    <h3 class="h5 text-info mt-4">🔁 Replacement Policy</h3>
                    <p>If a lead qualifies for a refund as per our criteria, we may offer a replacement lead instead of a monetary refund. This helps ensure both value for our clients and sustainability for our business.</p>
                    <hr>

                    <h3 class="h5 mt-4">📩 How to Request a Refund/Replacement</h3>
                    <p>Please email us at <a href="mailto:task365.in@gmail.com">task365.in@gmail.com</a> with:</p>
                    <ul class="ps-3">
                        <li>Your registered name & contact number</li>
                        <li>Lead ID or Batch Name</li>
                        <li>Reason for refund/replacement</li>
                        <li>Supporting evidence (if applicable)</li>
                    </ul>
                    <p>Our team will verify the claim within 3-5 working days, and approved cases will be credited or replaced accordingly.</p>
                    <hr>

                    <h3 class="h5 mt-4">⚠️ Important Notes</h3>
                    <ul class="ps-3">
                        <li>Abuse of the refund policy may result in service suspension.</li>
                        <li>Refunds, where applicable, will be processed to the original payment method within 7 working days.</li>
                    </ul>
                    <hr>

                    <p class="mb-0">Let me know if you’d like this policy in PDF format or want to customize it further based on how you deliver or categorize leads.</p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Refund Policy Content End -->

@endsection
