  <!-- Footer -->
  
  @if($is_default)
  <footer class="bg-white text-gray-800 py-12 px-6 border-t border-gray-200">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
      <div class="col-span-2 md:col-span-1">
        <h4 class="text-2xl font-medium mb-4">BoutiqueStyle</h4>
        <p class="text-gray-600 mb-4">Sophisticated style, timeless beauty.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Sale</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">FAQ</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">About Us</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Careers</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-200 mt-12 pt-8 text-center text-gray-500">
      <p>&copy; 2025 BoutiqueStyle. All rights reserved.</p>
    </div>
  </footer>
@else
  <footer class="bg-white text-gray-800 py-12 px-6 border-t border-gray-200">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
      <div class="col-span-2 md:col-span-1">
        <h4 class="text-2xl font-medium mb-4">{{ $headerFooter->site_name }}</h4>
        <p class="text-gray-600 mb-4">{{ $headerFooter->footer_text }}</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Sale</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">FAQ</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">About Us</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Careers</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-200 mt-12 pt-8 text-center text-gray-500">
      <p>&copy; 2025 {{ $headerFooter->site_name }}. All rights reserved.</p>
    </div>
  </footer>
@endif

  <script>
    // Simple animation for testimonial stars
    document.querySelectorAll('.fa-star').forEach(star => {
      star.addEventListener('mouseover', () => {
        star.style.transform = 'scale(1.2)';
        star.style.transition = 'transform 0.2s ease';
      });
      star.addEventListener('mouseout', () => {
        star.style.transform = 'scale(1)';
      });
    });
  </script>
</body>

</html>