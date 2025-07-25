@include('includes/head')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-light text-dark">

 <div class="min-h-screen flex items-center justify-center bg-light px-4 py-8">
  <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
    <h2 class="text-2xl font-bold text-center text-primary mb-6">Create Your Account</h2>

    <form id="registerForm">
      <!-- Phone Number -->
      <div class="mb-4 flex items-center gap-2">
        <input type="text" id="phone" name="phone" placeholder="Enter WhatsApp Number"
          class="flex-1 border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-primary" required>
        <button type="button" onclick="sendOTP()" class="bg-primary text-white px-4 py-2 rounded hover:bg-secondary">Send OTP</button>
      </div>

      <!-- OTP Input -->
      <div class="mb-4 flex items-center gap-2" id="otpSection" style="display:none;">
        <input type="text" id="otp" name="otp" placeholder="Enter OTP"
          class="flex-1 border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-primary">
        <button type="button" onclick="verifyOTP()" class="bg-primary text-white px-4 py-2 rounded hover:bg-secondary">Verify OTP</button>
      </div>

      <!-- OTP Verified Message -->
      <p id="otpVerifiedMsg" class="text-green-600 font-medium text-sm mb-4 hidden">✅ OTP Verified</p>

      <!-- Password -->
      <input type="password" id="password" name="password" placeholder="Password"
        class="w-full border border-gray-300 rounded px-4 py-2 mb-4 focus:ring-2 focus:ring-primary" disabled required>

      <!-- Confirm Password -->
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"
        class="w-full border border-gray-300 rounded px-4 py-2 mb-6 focus:ring-2 focus:ring-primary" disabled required>

      <!-- Register Button -->
      <button type="submit" class="w-full bg-primary text-white px-4 py-2 rounded hover:bg-secondary" disabled id="registerBtn">Register</button>

      <!-- Login Link -->
      <p class="mt-6 text-sm text-center text-gray-600">
        Already have an account?
        <a href="/login" class="text-primary font-semibold hover:underline">Login here</a>
      </p>
    </form>
  </div>
</div>

<script>
  function sendOTP() {
    const phone = document.getElementById("phone").value;
    if (phone.length >= 10) {
      // Simulate OTP sent
      document.getElementById("otpSection").style.display = "flex";
      alert("OTP sent to " + phone);
    } else {
      alert("Enter a valid number");
    }
  }

  function verifyOTP() {
    const otp = document.getElementById("otp").value;
    if (otp === "1234") { // Simulate OTP
      document.getElementById("otpVerifiedMsg").classList.remove("hidden");
      document.getElementById("password").disabled = false;
      document.getElementById("confirmPassword").disabled = false;
      document.getElementById("registerBtn").disabled = false;
      alert("OTP Verified!");
    } else {
      alert("Invalid OTP");
    }
  }
</script>
<script>
  document.getElementById("registerForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    const response = await fetch("/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify({ phone, password })
    });

    const data = await response.json();

    if (data.status === "success") {
      alert(data.message);
      location.reload(); // or redirect to login
    } else {
      alert("Something went wrong!");
    }
  });
</script>
