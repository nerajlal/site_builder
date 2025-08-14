@php
  $currentUrl = request()->url();
  $detectedHeaderFooterId = null;
  if (preg_match('/\/(?:index|product)\d\/([0-9]+)/', $currentUrl, $m)) { $detectedHeaderFooterId = $m[1]; }
  $effectiveHeaderFooterId = $detectedHeaderFooterId ?? ($headerFooter->id ?? null);
@endphp

<div id="loginModal" class="hidden fixed inset-0 z-[1000] items-center justify-center">
  <div class="absolute inset-0 bg-black/50" onclick="closeLoginModal()"></div>
  <div class="relative bg-white w-full max-w-md rounded-lg shadow-xl p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold" id="modalTitle">Boutique Sign In</h3>
      <button onclick="closeLoginModal()" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times"></i></button>
    </div>

    <input type="hidden" id="hfIdInput" value="{{ $effectiveHeaderFooterId }}" />

    <!-- Signed Out State -->
    <div id="signedOutState" class="space-y-4">
      <!-- Login/Register Toggle -->
      <div class="flex border-b border-gray-200 mb-4">
        <button id="loginTab" onclick="showLoginForm()" class="flex-1 py-2 px-4 text-center border-b-2 border-pink-600 text-pink-600 font-medium">
          Login
        </button>
        <button id="registerTab" onclick="showRegisterForm()" class="flex-1 py-2 px-4 text-center text-gray-500 hover:text-gray-700">
          Register
        </button>
      </div>

      <!-- Login Form -->
      <div id="loginForm" class="space-y-4">
        <label class="block text-sm font-medium">WhatsApp Number</label>
        <input id="loginWhatsappInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="e.g. +1234567890" />
        <label class="block text-sm font-medium">Password</label>
        <input id="loginPasswordInput" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="Your password" />
        <button onclick="login()" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded">Login</button>
      </div>

      <!-- Registration Form -->
      <div id="registerForm" class="space-y-4 hidden">
        <div id="step1" class="space-y-4">
          <label class="block text-sm font-medium">WhatsApp Number</label>
          <input id="whatsappInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="e.g. +1234567890" />
          <button onclick="sendOtp()" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded">Send OTP</button>
        </div>

        <div id="step2" class="space-y-4 hidden">
          <label class="block text-sm font-medium">Enter OTP (hint: 1234)</label>
          <input id="otpInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="1234" />
          <button onclick="verifyOtp()" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded">Verify OTP</button>
        </div>

        <div id="step3" class="space-y-4 hidden">
          <label class="block text-sm font-medium">Name</label>
          <input id="nameInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="Your name" />
          <label class="block text-sm font-medium">Password</label>
          <input id="passwordInput" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-600" placeholder="Choose a password" />
          <button onclick="setCredentials()" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded">Continue</button>
        </div>
      </div>
    </div>

    <!-- Signed In State -->
    <div id="signedInState" class="space-y-4 hidden">
      <div class="text-center">
        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-user text-pink-600 text-2xl"></i>
        </div>
        <h4 class="text-lg font-semibold mb-2" id="customerName">Welcome!</h4>
        <p class="text-gray-600 text-sm mb-4" id="customerWhatsapp"></p>
        <button onclick="signOut()" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded">Sign Out</button>
      </div>
    </div>

    <p id="authMsg" class="mt-3 text-sm"></p>
  </div>
</div>

<script>
  let currentCustomer = null;

  // Check authentication status when modal opens
  async function checkAuthStatus() {
    try {
      const response = await fetch('/customer/check-auth');
      const data = await response.json();
      
      if (data.signed_in) {
        currentCustomer = data.customer;
        showSignedInState();
      } else {
        showSignedOutState();
      }
    } catch (error) {
      console.error('Error checking auth status:', error);
      showSignedOutState();
    }
  }

  function showSignedInState() {
    document.getElementById('signedOutState').classList.add('hidden');
    document.getElementById('signedInState').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Welcome Back!';
    
    if (currentCustomer) {
      document.getElementById('customerName').textContent = `Welcome, ${currentCustomer.name}!`;
      document.getElementById('customerWhatsapp').textContent = currentCustomer.whatsapp;
    }
    
    // Update header button
    if (typeof updateAuthButton === 'function') {
      updateAuthButton(true);
    }
  }

  function showSignedOutState() {
    document.getElementById('signedInState').classList.add('hidden');
    document.getElementById('signedOutState').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Boutique Sign In';
    setStep(1);
    setMsg('');
    showLoginForm(); // Default to login form
    
    // Update header button
    if (typeof updateAuthButton === 'function') {
      updateAuthButton(false);
    }
  }

  function showLoginForm() {
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('loginTab').classList.add('border-pink-600', 'text-pink-600');
    document.getElementById('loginTab').classList.remove('text-gray-500');
    document.getElementById('registerTab').classList.remove('border-pink-600', 'text-pink-600');
    document.getElementById('registerTab').classList.add('text-gray-500');
  }

  function showRegisterForm() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
    document.getElementById('registerTab').classList.add('border-pink-600', 'text-pink-600');
    document.getElementById('registerTab').classList.remove('text-gray-500');
    document.getElementById('loginTab').classList.remove('border-pink-600', 'text-pink-600');
    document.getElementById('loginTab').classList.add('text-gray-500');
    setStep(1);
  }

  async function login() {
    const whatsapp = document.getElementById('loginWhatsappInput')?.value.trim();
    const password = document.getElementById('loginPasswordInput')?.value.trim();
    const header_footer_id = document.getElementById('hfIdInput')?.value;
    
    if (!whatsapp || !password || !header_footer_id) { 
      setMsg('Please fill in all fields'); 
      return; 
    }
    
    try {
      const res = await fetch('/customer/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify({ whatsapp, password, header_footer_id })
      });
      
      if (!res.ok) {
        const errorData = await res.json();
        throw new Error(errorData.message || 'Login failed');
      }
      
      const data = await res.json();
      currentCustomer = data.customer;
      setMsg('Login successful!', true);
      setTimeout(() => {
        showSignedInState();
        setTimeout(() => closeLoginModal(), 500);
      }, 500);
    } catch (e) { 
      setMsg(e.message || 'Login failed'); 
    }
  }

  function openLoginModal() {
    const m = document.getElementById('loginModal');
    if (!m) return;
    m.classList.remove('hidden');
    m.classList.add('flex');
    checkAuthStatus();
  }

  function closeLoginModal() {
    const m = document.getElementById('loginModal');
    if (!m) return;
    m.classList.add('hidden');
  }

  function setStep(n) {
    ['step1','step2','step3'].forEach(id => document.getElementById(id)?.classList.add('hidden'));
    document.getElementById('step' + n)?.classList.remove('hidden');
  }
  
  function setMsg(text, ok=false) {
    const el = document.getElementById('authMsg');
    if (!el) return;
    el.textContent = text;
    el.className = 'mt-3 text-sm ' + (ok ? 'text-green-600' : 'text-red-600');
  }
  
  function csrf() {
    const t = document.querySelector('meta[name="csrf-token"]');
    return t ? t.getAttribute('content') : '';
  }

  async function signOut() {
    try {
      const response = await fetch('/customer/sign-out', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() }
      });
      
      if (response.ok) {
        currentCustomer = null;
        showSignedOutState();
        setMsg('Signed out successfully!', true);
        setTimeout(() => closeLoginModal(), 1000);
      } else {
        setMsg('Error signing out');
      }
    } catch (error) {
      setMsg('Error signing out');
    }
  }

  async function sendOtp() {
    const whatsapp = document.getElementById('whatsappInput')?.value.trim();
    const header_footer_id = document.getElementById('hfIdInput')?.value;
    if (!whatsapp || !header_footer_id) { setMsg('Missing WhatsApp or site id'); return; }
    try {
      const res = await fetch('/customer/send-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify({ whatsapp, header_footer_id })
      });
      if (!res.ok) throw new Error('Failed to send OTP');
      setMsg('OTP sent. Please enter it below.', true);
      setStep(2);
    } catch (e) { setMsg(e.message || 'Error'); }
  }

  async function verifyOtp() {
    const otp = document.getElementById('otpInput')?.value.trim();
    if (!otp) { setMsg('Enter OTP'); return; }
    try {
      const res = await fetch('/customer/verify-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify({ otp })
      });
      if (!res.ok) throw new Error('Invalid OTP');
      setMsg('OTP verified. Set your name and password.', true);
      setStep(3);
    } catch (e) { setMsg(e.message || 'Error'); }
  }

  async function setCredentials() {
    const name = document.getElementById('nameInput')?.value.trim();
    const password = document.getElementById('passwordInput')?.value.trim();
    if (!name || !password) { setMsg('Enter name and password'); return; }
    try {
      const res = await fetch('/customer/set-credentials', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify({ name, password })
      });
      if (!res.ok) throw new Error('Failed to complete sign in');
      setMsg('Signed in successfully!', true);
      setTimeout(() => {
        checkAuthStatus(); // Refresh auth status
        setTimeout(() => closeLoginModal(), 500);
      }, 500);
    } catch (e) { setMsg(e.message || 'Error'); }
  }
</script>

