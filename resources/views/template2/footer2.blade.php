  <!-- Footer -->
  
  @if($is_default)
  <footer class="bg-black text-white py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-xl font-light mb-4 flex items-center">
          <i class="fas fa-store mr-2 text-pink-500"></i> BoutiqueElite
        </h4>
        <p class="text-gray-400 mb-4">Your destination for curated fashion and timeless elegance.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Sale</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
      <p>&copy; 2025 BoutiqueElite. All rights reserved.</p>
    </div>
  </footer>
@else
  <footer class="bg-black text-white py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h4 class="text-xl font-light mb-4 flex items-center">
          <i class="fas fa-store mr-2 text-pink-500"></i> {{ $headerFooter->site_name }}
        </h4>
        <p class="text-gray-400 mb-4">{{ $headerFooter->footer_text }}</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-pinterest"></i>
          </a>
        </div>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Shop</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">New Arrivals</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Best Sellers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Sale</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Gift Cards</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Customer Service</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Shipping & Returns</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Personal Styling</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold text-lg mb-4">Company</h5>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
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