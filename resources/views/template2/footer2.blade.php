  <!-- Footer -->
  
  @if($is_default)
  <footer class="bg-black text-white py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-2xl font-light tracking-wider mb-4 flex items-center">
          <span class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-600 to-pink-800 flex items-center justify-center mr-3">
            <i class="fas fa-store text-white"></i>
          </span>
          BoutiqueElite
        </h4>
        <p class="text-gray-400 mb-4">Your destination for curated fashion and timeless elegance.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Sale</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">About Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Careers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
      <p>&copy; 2025 BoutiqueElite. All rights reserved.</p>
    </div>
  </footer>
@else
  <footer class="bg-black text-white py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-2xl font-light tracking-wider mb-4 flex items-center">
          <span class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-600 to-pink-800 flex items-center justify-center mr-3">
            <i class="fas fa-store text-white"></i>
          </span>
          {{ $headerFooter->site_name }}
        </h4>
        <p class="text-gray-400 mb-4">{{ $headerFooter->footer_text }}</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-pink-500 transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Sale</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-medium text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">About Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Careers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-pink-500 transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
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