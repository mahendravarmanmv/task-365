<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Payment Successful</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap 5 CSS CDN -->
  
</head>
<body class="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <div class="d-flex min-vh-100 justify-content-center align-items-center px-3">
    <div class="bg-white shadow rounded-4 p-5 text-center" style="max-width: 480px; width: 100%;">
      
		@if (session('success'))
      <h2 class="fw-bold text-success mb-3">Payment Successful!</h2>
      <p class="fs-5 mb-4">Thank you for your payment. Your transaction was completed successfully.</p>
@endif
@if (session('error'))
      <h2 class="fw-bold text-danger mb-3">Payment Failure</h2>
      <p class="fs-5 mb-4"><strong>Error!</strong> {{ session('error') }}</p>
@endif
@if (session('payment'))
                        <div class="card my-3">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Payment Details</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Payment ID:</strong> {{ session('payment')->payment_id }}</p>
                                <p><strong>Order Id:</strong> {{ session('payment')->order_id }}</p>
                                <p><strong>Amount:</strong> ₹{{ session('payment')->amount }}</p>
                            </div>
                        </div>
                    @endif
      <a href="{{ url('/') }}" class="btn btn-success btn-lg rounded-pill px-4">Go to Home</a>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle (Optional) -->
  
</body>
</html>
