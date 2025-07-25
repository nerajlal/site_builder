<!-- Footer -->
<!-- FontAwesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<footer class="bg-gray-900 text-white py-16 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
      
      <!-- Branding / About -->
      <div class="lg:col-span-2">
        <div class="text-3xl font-bold mb-4 text-accent">BuildYourStore</div>
        <p class="text-gray-400 mb-6 max-w-md leading-relaxed">
          Empowering entrepreneurs to build successful online stores with the power of artificial intelligence.
        </p>
        <div class="flex space-x-4">
          <!-- Social Icons -->
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent hover:text-primary transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent hover:text-primary transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent hover:text-primary transition">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent hover:text-primary transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent hover:text-primary transition">
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>

      <!-- Product and Support Grid -->
      <div class="grid grid-cols-2 gap-8 md:col-span-2">
        <!-- Product -->
        <div>
          <h4 class="font-bold mb-4 text-lg">Product</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#features" class="hover:text-accent transition">Features</a></li>
            <li><a href="#pricing" class="hover:text-accent transition">Pricing</a></li>
            <li><a href="#how-it-works" class="hover:text-accent transition">How It Works</a></li>
            <li><a href="#" class="hover:text-accent transition">Templates</a></li>
          </ul>
        </div>

        <!-- Support -->
        <div>
          <h4 class="font-bold mb-4 text-lg">Support</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#faq" class="hover:text-accent transition">FAQ</a></li>
            <li><a href="#" class="hover:text-accent transition">Help Center</a></li>
            <li><a href="#" class="hover:text-accent transition">Contact Us</a></li>
            <li><a href="#" class="hover:text-accent transition">API Docs</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm mb-4 md:mb-0">
          © 2025 BuildYourStore Builder. All rights reserved.
        </p>
        <div class="flex space-x-6 text-sm text-gray-400">
          <a href="#" class="hover:text-accent transition">Privacy Policy</a>
          <a href="#" class="hover:text-accent transition">Terms of Service</a>
          <a href="#" class="hover:text-accent transition">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Footer Scripts -->
<script>
  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Sticky navbar scroll effect
  window.addEventListener('scroll', function () {
    const nav = document.querySelector('nav');
    if (window.scrollY > 100) {
      nav?.classList.add('bg-white/98', 'backdrop-blur-md');
      nav?.classList.remove('bg-white/95');
    } else {
      nav?.classList.add('bg-white/95');
      nav?.classList.remove('bg-white/98', 'backdrop-blur-md');
    }
  });

  // FAQ background toggle
  document.querySelectorAll('details').forEach(detail => {
    detail.addEventListener('toggle', function () {
      this.style.backgroundColor = this.open ? '#f3f4f6' : '#f9fafb';
    });
  });

  // CTA loading animation
  document.querySelectorAll('a[href="#"], button').forEach(button => {
    button.addEventListener('click', function (e) {
      if (this.textContent.includes('Build My FREE Store') || this.textContent.includes('Get Started')) {
        e.preventDefault();
        const originalText = this.textContent;
        this.textContent = 'Creating your store...';
        this.style.opacity = '0.7';
        setTimeout(() => {
          this.textContent = originalText;
          this.style.opacity = '1';
          // alert('Demo: Your AI store would be created here! 🚀');
        }, 2000);
      }
    });
  });
</script>
