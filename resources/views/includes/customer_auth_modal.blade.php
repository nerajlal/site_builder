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
      <h3 class="text-xl font-semibold">Sign In</h3>
      <button onclick="closeLoginModal()" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times"></i></button>
    </div>

    <input type="hidden" id="hfIdInput" value="{{ $effectiveHeaderFooterId }}" />

    <div id="step1" class="space-y-4">
      <label class="block text-sm font-medium">WhatsApp Number</label>
      <input id="whatsappInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-600" placeholder="e.g. +1234567890" />
      <button onclick="sendOtp()" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 rounded">Send OTP</button>
    </div>

    <div id="step2" class="space-y-4 hidden">
      <label class="block text-sm font-medium">Enter OTP (hint: 1234)</label>
      <input id="otpInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-600" placeholder="1234" />
      <button onclick="verifyOtp()" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 rounded">Verify OTP</button>
    </div>

    <div id="step3" class="space-y-4 hidden">
      <label class="block text-sm font-medium">Name</label>
      <input id="nameInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-600" placeholder="Your name" />
      <label class="block text-sm font-medium">Password</label>
      <input id="passwordInput" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-600" placeholder="Choose a password" />
      <button onclick="setCredentials()" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 rounded">Continue</button>
    </div>

    <p id="authMsg" class="mt-3 text-sm"></p>
  </div>
</div>

<script>
  function openLoginModal() {
    const m = document.getElementById('loginModal');
    if (!m) return;
    m.classList.remove('hidden');
    m.classList.add('flex');
    setStep(1);
    setMsg('');
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
      setTimeout(() => closeLoginModal(), 800);
    } catch (e) { setMsg(e.message || 'Error'); }
  }
</script>

