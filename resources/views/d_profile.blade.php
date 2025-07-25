@include('includes.d_head')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Profile Header -->
        <div class="mb-6 flex flex-col md:flex-row items-start md:items-center justify-between">
            <div class="flex items-center mb-4 md:mb-0">
                <img class="w-16 h-16 rounded-full mr-4" 
                     src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png" 
                     alt="User profile">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ old('first_name', optional($profile)->first_name ?? '') }} 
                        {{ old('last_name', optional($profile)->last_name ?? '') }}
                    </h1>
                    <p class="text-gray-600">User</p>
                </div>
            </div>
            <button id="edit-profile-btn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                Edit Profile
            </button>
        </div>

        <!-- Profile Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Personal Information -->
            <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">First Name</label>
                        <p class="mt-1 text-sm text-gray-800">{{ optional($profile)->first_name ?? 'NIL' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Name</label>
                        <p class="mt-1 text-sm text-gray-800">{{ optional($profile)->last_name ?? 'NIL' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-sm text-gray-800">{{ optional($profile)->email ?? 'NIL' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1 text-sm text-gray-800">{{ optional($account)->phone ?? 'NIL' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500">Address</label>
                        <p class="mt-1 text-sm text-gray-800">{{ optional($profile)->address ?? 'NIL' }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Status -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Account Status</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Member Since</label>
                        <p class="mt-1 text-sm text-gray-800">
                            {{ optional(optional($account)->created_at)->format('F j, Y') ?? 'NIL' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Login</label>
                        <p class="mt-1 text-sm text-gray-800">
                            {{ session('login_time') ? \Carbon\Carbon::parse(session('login_time'))->diffForHumans() : 'NIL' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Account Type</label>
                        <p class="mt-1 text-sm text-gray-800">User</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Security -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Security</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">Password</h3>
                            <p class="text-xs text-gray-500">
                                Last Changed on {{ optional(optional($account)->updated_at)->format('F j, Y') ?? 'NIL' }}
                            </p>
                        </div>
                        <button class="text-sm text-indigo-600 hover:text-indigo-800">Change</button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">Number Verification</h3>
                            <p class="text-sm text-gray-500">Make your profile Verified</p>
                        </div>
                        <button class="flex items-center text-sm text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Verified
                        </button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-medium text-gray-800">Connected Devices</h3>
                            <p class="text-sm text-gray-500">2 devices active</p>
                        </div>
                        <button class="text-sm text-indigo-600 hover:text-indigo-800">Manage</button>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Changed password</p>
                            <p class="text-xs text-gray-500">
                                {{ optional(optional($account)->updated_at)->format('F j, Y') ?? 'NIL' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Logged in </p>
                            <p class="mt-1 text-sm text-gray-800">
                                {{ session('login_time') ? \Carbon\Carbon::parse(session('login_time'))->diffForHumans() : 'NIL' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-3">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Updated profile information</p>
                            <p class="text-xs text-gray-500">
                                {{ optional(optional($profile)->updated_at)->format('F j, Y') ?? 'NIL' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preferences -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Preferences</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-sm font-medium text-gray-800">Language</h3>
                        <p class="text-sm text-gray-500">English (United States)</p>
                    </div>
                    <button class="text-sm text-indigo-600 hover:text-indigo-800">Change</button>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-sm font-medium text-gray-800">Timezone</h3>
                        <p class="text-sm text-gray-500">(GMT+05:30) Indian Standard Time (IST)</p>
                    </div>
                    <button class="text-sm text-indigo-600 hover:text-indigo-800">Change</button>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-sm font-medium text-gray-800">Notification Preferences</h3>
                        <p class="text-sm text-gray-500">WhatsApp notifications</p>
                    </div>
                    <button class="text-sm text-indigo-600 hover:text-indigo-800">Manage</button>
                </div>
            </div>
        </div>
    </main>
</div>

@include('includes.d_footer')
</div>

<!-- Edit Profile Modal -->
<div id="edit-profile-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 lg:w-1/3 shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-xl font-semibold text-gray-800">Edit Profile</h3>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Modal content -->
        <div class="mt-4">
            <form id="profile-form">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" id="first-name" name="first_name" 
                               value="{{ old('first_name', optional($profile)->first_name ?? '') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" id="last-name" name="last_name" 
                               value="{{ old('last_name', optional($profile)->last_name ?? '') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" 
                           value="{{ old('email', optional($profile)->email ?? '') }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea id="address" name="address" rows="2" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('address', optional($profile)->address ?? '') }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" id="cancel-edit" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('edit-profile-modal');
        const editBtn = document.getElementById('edit-profile-btn');
        const closeBtn = document.getElementById('close-modal');
        const cancelBtn = document.getElementById('cancel-edit');
        const profileForm = document.getElementById('profile-form');

        // Open modal
        editBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        // Close modal
        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Profile form submit
        profileForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = {
                first_name: document.getElementById('first-name').value,
                last_name: document.getElementById('last-name').value,
                email: document.getElementById('email').value,
                address: document.getElementById('address').value,
            };

            fetch('/profile/update', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message || 'Profile updated successfully.');
                document.querySelector('.text-2xl.font-bold').textContent =
                    `${formData.first_name} ${formData.last_name}`;
                closeModal();
            })
            .catch(error => {
                alert('Failed to update profile. Please try again.');
                console.error(error);
            });
        });
    });
</script>
