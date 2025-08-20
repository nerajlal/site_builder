<div id="profileModal" class="hidden fixed inset-0 z-[1000] items-center justify-center">
  <div class="absolute inset-0 bg-black/50" onclick="closeProfileModal()"></div>
  <div class="relative bg-white w-full max-w-lg rounded-lg shadow-xl p-6">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold">Update Profile</h3>
      <button onclick="closeProfileModal()" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times"></i></button>
    </div>

    <div class="space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium">Phone Number</label>
          <input id="phoneInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium">Address Line 1</label>
        <input id="address1Input" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
      </div>
      <div>
        <label class="block text-sm font-medium">Address Line 2</label>
        <input id="address2Input" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium">City</label>
          <input id="cityInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
        <div>
          <label class="block text-sm font-medium">State</label>
          <input id="stateInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium">Postal Code</label>
          <input id="postalCodeInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
        <div>
          <label class="block text-sm font-medium">Country</label>
          <input id="countryInput" type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
      </div>
      <button onclick="updateProfile()" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded">Update Profile</button>
    </div>
    <p id="profileMsg" class="mt-3 text-sm"></p>
  </div>
</div>

<script>
  function openProfileModal() {
    const m = document.getElementById('profileModal');
    if (!m) return;
    m.classList.remove('hidden');
    m.classList.add('flex');
    loadProfileData();
  }

  function closeProfileModal() {
    const m = document.getElementById('profileModal');
    if (!m) return;
    m.classList.add('hidden');
  }

  async function loadProfileData() {
    try {
      const response = await fetch('/customer/profile');
      if (!response.ok) throw new Error('Failed to load profile');
      const data = await response.json();

      document.getElementById('phoneInput').value = data.phone || '';
      document.getElementById('address1Input').value = data.address_line_1 || '';
      document.getElementById('address2Input').value = data.address_line_2 || '';
      document.getElementById('cityInput').value = data.city || '';
      document.getElementById('stateInput').value = data.state || '';
      document.getElementById('postalCodeInput').value = data.postal_code || '';
      document.getElementById('countryInput').value = data.country || '';

    } catch (error) {
      setProfileMsg(error.message || 'Could not load profile data.');
    }
  }

  async function updateProfile() {
    const profileData = {
      phone: document.getElementById('phoneInput').value,
      address_line_1: document.getElementById('address1Input').value,
      address_line_2: document.getElementById('address2Input').value,
      city: document.getElementById('cityInput').value,
      state: document.getElementById('stateInput').value,
      postal_code: document.getElementById('postalCodeInput').value,
      country: document.getElementById('countryInput').value,
    };

    try {
      const response = await fetch('/customer/profile/update', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf() },
        body: JSON.stringify(profileData)
      });

      const data = await response.json();

      if (!response.ok) {
        if (data.errors) {
          const errorMessages = Object.values(data.errors).flat().join(' ');
          throw new Error(errorMessages);
        }
        throw new Error(data.message || 'Failed to update profile');
      }

      setProfileMsg('Profile updated successfully!', true);
      setTimeout(() => closeProfileModal(), 1000);

    } catch (error) {
      setProfileMsg(error.message || 'An error occurred.');
    }
  }

  function setProfileMsg(text, ok = false) {
    const el = document.getElementById('profileMsg');
    if (!el) return;
    el.textContent = text;
    el.className = 'mt-3 text-sm ' + (ok ? 'text-green-600' : 'text-red-600');
  }

  function csrf() {
    const t = document.querySelector('meta[name="csrf-token"]');
    return t ? t.getAttribute('content') : '';
  }
</script>
