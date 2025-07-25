@include('includes/head')

<body class="bg-light text-dark">

  <div class="min-h-screen flex items-center justify-center bg-light py-10 px-4">
    <div class="bg-white shadow-xl rounded-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-center text-primary mb-6">Login to Your Store</h2>

      <form method="POST" action="/login">
        @csrf

        <div class="mb-4">
          <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
          <input type="tel" name="phone" id="phone" required
            class="w-full px-4 py-2 border rounded-lg focus:ring-primary focus:border-primary">
        </div>

        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" name="password" id="password" required
            class="w-full px-4 py-2 border rounded-lg focus:ring-primary focus:border-primary">
        </div>

        <button type="submit"
          class="w-full bg-primary text-white py-2 rounded hover:bg-secondary">Login</button>
      </form>

      <!-- Register Link -->
      <p class="mt-6 text-sm text-center text-gray-600">
        Don't have an account?
        <a href="/register" class="text-primary font-semibold hover:underline">Register here</a>
      </p>
    </div>
  </div>

  @include('includes/footer')
</body>
