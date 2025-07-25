<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
  <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1f2937',
                        accent: '#fbbf24',
                        bgLight: '#f9fafb',
                        purple: {
                            900: '#581c87'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1f2937 0%, #581c87 100%);
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .glow-button {
            box-shadow: 0 4px 15px 0 rgba(251, 191, 36, 0.3);
        }
        
        .glow-button:hover {
            box-shadow: 0 8px 25px 0 rgba(251, 191, 36, 0.4);
            transform: translateY(-2px);
        }
        
        details[open] summary {
            margin-bottom: 1rem;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<section class="relative pt-32 pb-20 px-6 text-center gradient-bg text-white overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10 max-w-6xl mx-auto">
            <div class="animate-float">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight tracking-tight text-shadow">
                    Launch Your New<br>
                    <span class="text-accent">Online Store</span><br>
                    in Minutes
                </h1>
            </div>
            <p class="text-xl md:text-2xl mb-10 max-w-4xl mx-auto text-gray-200 font-medium leading-relaxed">
                We helps you pick products, design your store, and go live — zero coding needed.
            </p>
            @php
              $url = session('userid') ? '/dashboard' : '/login';
            @endphp

            <a href="{{ $url }}" class="inline-block bg-accent text-primary font-bold text-lg rounded-full px-12 py-5 glow-button transition duration-300">
                Build My FREE Store
            </a>

            <div class="mt-6 flex items-center justify-center space-x-2 text-accent/90">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm font-medium">Only 15 stores were remaining — secure yours today!</p>
            </div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-accent/20 rounded-full blur-xl"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-purple-500/20 rounded-full blur-xl"></div>
    </section>

    <!-- Trust Section -->
    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-gray-600 font-semibold mb-10 text-lg">Trusted by thousands of entrepreneurs worldwide</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="flex flex-col items-center space-y-4 hover-lift">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <img src="https://img.icons8.com/color/48/shopify.png" alt="Shopify" class="w-10 h-10" />
                    </div>
                    <p class="font-semibold text-gray-800">Built for You</p>
                </div>
                <div class="flex flex-col items-center space-y-4 hover-lift">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <img src="https://img.icons8.com/fluency/48/artificial-intelligence.png" alt="AI Powered" class="w-10 h-10" />
                    </div>
                    <p class="font-semibold text-gray-800">High Powered Engine</p>
                </div>
                <div class="flex flex-col items-center space-y-4 hover-lift">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <img src="https://img.icons8.com/color/48/security-checked.png" alt="Secure" class="w-10 h-10" />
                    </div>
                    <p class="font-semibold text-gray-800">Secure & Reliable</p>
                </div>
                <div class="flex flex-col items-center space-y-4 hover-lift">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                        <img src="https://img.icons8.com/color/48/like--v1.png" alt="Trusted" class="w-10 h-10" />
                    </div>
                    <p class="font-semibold text-gray-800">1000+ Happy Sellers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-24 px-6 bg-bgLight">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-primary">How It Works</h2>
            <p class="text-xl text-gray-600 mb-16 max-w-3xl mx-auto">Get your store up and running in three simple steps</p>
            
            <div class="grid md:grid-cols-3 gap-12">
                <div class="relative">
                    <div class="bg-white p-10 rounded-2xl shadow-lg hover-lift border border-gray-100">
                        <div class="text-7xl mb-6">🛍️</div>
                        <div class="absolute -top-4 -right-4 bg-accent text-primary w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg">1</div>
                        <h3 class="text-2xl font-bold mb-4 text-primary">Choose Your Niche</h3>
                        <p class="text-gray-600 leading-relaxed">Select a product category tailored to your passion or trending market demands.</p>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-white p-10 rounded-2xl shadow-lg hover-lift border border-gray-100">
                        <div class="text-7xl mb-6">🤖</div>
                        <div class="absolute -top-4 -right-4 bg-accent text-primary w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg">2</div>
                        <h3 class="text-2xl font-bold mb-4 text-primary">Let AI Build It</h3>
                        <p class="text-gray-600 leading-relaxed">We automatically preloads winning products, designs themes, and creates content.</p>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-white p-10 rounded-2xl shadow-lg hover-lift border border-gray-100">
                        <div class="text-7xl mb-6">🚀</div>
                        <div class="absolute -top-4 -right-4 bg-accent text-primary w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg">3</div>
                        <h3 class="text-2xl font-bold mb-4 text-primary">Go Live & Sell</h3>
                        <p class="text-gray-600 leading-relaxed">Launch your professional store and start earning money immediately.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-primary">Powerful Features</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Everything you need to build a successful online store</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-2xl shadow-lg hover-lift border border-yellow-100">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">Winning Products</h3>
                    <p class="text-gray-700 leading-relaxed">We analyzes market trends and selects top-selling products with proven track records, so you start with confidence and higher conversion rates.</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl shadow-lg hover-lift border border-purple-100">
                    <div class="text-4xl mb-4">🎨</div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">High-Converting Themes</h3>
                    <p class="text-gray-700 leading-relaxed">Modern, mobile-first designs that are scientifically optimized for conversions and user experience across all devices.</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl shadow-lg hover-lift border border-blue-100">
                    <div class="text-4xl mb-4">🧩</div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">Ready-to-Sell Pages</h3>
                    <p class="text-gray-700 leading-relaxed">Complete product pages, policies, and content come pre-filled with compelling copy. Just customize and you're ready to sell.</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl shadow-lg hover-lift border border-green-100">
                    <div class="text-4xl mb-4">🌐</div>
                    <h3 class="text-2xl font-bold mb-4 text-primary">Free .store Domain</h3>
                    <p class="text-gray-700 leading-relaxed">Get a professional, brandable domain name included at no extra cost, saving you money and setup time.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="testimonials" class="py-24 px-6 bg-bgLight">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-primary">Success Stories</h2>
            <p class="text-xl text-gray-600 mb-16 max-w-3xl mx-auto">See what our users have achieved</p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <blockquote class="text-gray-700 text-lg leading-relaxed mb-6 italic">
                        "This platform made launching my store unbelievably easy. It's recommendations boosted my sales in the first month itself!"
                    </blockquote>
                    <footer class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold mr-4">S</div>
                        <div class="text-left">
                            <div class="font-bold text-primary">Sarah M.</div>
                            <div class="text-gray-500 text-sm">Fashion Store Owner</div>
                        </div>
                    </footer>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <blockquote class="text-gray-700 text-lg leading-relaxed mb-6 italic">
                        "No coding skills needed, and my store looks amazing on mobile. The customer support is incredibly responsive too!"
                    </blockquote>
                    <footer class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold mr-4">R</div>
                        <div class="text-left">
                            <div class="font-bold text-primary">Rahul K.</div>
                            <div class="text-gray-500 text-sm">Electronics Store</div>
                        </div>
                    </footer>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <blockquote class="text-gray-700 text-lg leading-relaxed mb-6 italic">
                        "The free domain and instant setup saved me weeks of work and hundreds of dollars. I was selling within hours!"
                    </blockquote>
                    <footer class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold mr-4">P</div>
                        <div class="text-left">
                            <div class="font-bold text-primary">Priya S.</div>
                            <div class="text-gray-500 text-sm">Beauty Products</div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-24 px-6 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-primary">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Everything you need to know about building your AI store</p>
            </div>
            
            <div class="space-y-6">
                <details class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 group">
                    <summary class="font-bold text-lg cursor-pointer text-primary group-hover:text-purple-600 transition">
                        Do I need any coding skills?
                    </summary>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Absolutely not! Our AI handles all the technical aspects including design, product selection, and content creation. You can launch a professional store without writing a single line of code.
                    </p>
                </details>
                
                <details class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 group">
                    <summary class="font-bold text-lg cursor-pointer text-primary group-hover:text-purple-600 transition">
                        How long does it take to get my store live?
                    </summary>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Typically just 2-5 minutes! After you select your niche, our AI instantly preloads winning products, applies conversion-optimized designs, and creates all necessary pages for you.
                    </p>
                </details>
                
                <details class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 group">
                    <summary class="font-bold text-lg cursor-pointer text-primary group-hover:text-purple-600 transition">
                        Can I customize the design and products?
                    </summary>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Yes! While AI creates your initial store, you have full control to customize colors, fonts, layouts, product descriptions, and add your own products anytime to match your brand perfectly.
                    </p>
                </details>
                
                <details class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 group">
                    <summary class="font-bold text-lg cursor-pointer text-primary group-hover:text-purple-600 transition">
                        Is there any cost involved?
                    </summary>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        We offer a completely free store to get you started, including the .store domain. Premium features and advanced customization options will be available in our upcoming paid plans.
                    </p>
                </details>
                
                <details class="bg-gray-50 p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 group">
                    <summary class="font-bold text-lg cursor-pointer text-primary group-hover:text-purple-600 transition">
                        What kind of support do you provide?
                    </summary>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        We provide comprehensive support including setup assistance, design guidance, and ongoing technical help. Our team is available via chat and email to ensure your success.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-24 px-6 bg-bgLight">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-primary">Simple, Transparent Pricing</h2>
            <p class="text-xl text-gray-600 mb-16 max-w-3xl mx-auto">Choose the plan that fits your business needs</p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift border-2 border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-2 text-primary">Free Plan</h3>
                        <div class="text-4xl font-bold text-primary mb-2">$0</div>
                        <p class="text-gray-600">Perfect for getting started</p>
                    </div>
                    
                    <ul class="text-left space-y-3 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            AI-powered store builder
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Free .store domain included
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Mobile-responsive themes
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Basic support
                        </li>
                    </ul>
                    
                    @php
                      $redirectUrl = session('userid') ? '/dashboard' : '/login';
                    @endphp

                    <button
                      class="bg-accent text-primary font-bold rounded-full px-8 py-4 w-full glow-button transition duration-300"
                      onclick="window.location.href='{{ $redirectUrl }}'">
                      Get Started Free
                    </button>
                </div>

                <div class="relative bg-gradient-to-br from-purple-50 to-indigo-50 p-8 rounded-2xl shadow-xl border-2 border-purple-200 transform scale-105">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white px-6 py-2 rounded-full text-sm font-semibold">
                        Coming Soon
                    </div>
                    
                    <div class="mb-8 opacity-70">
                        <h3 class="text-2xl font-bold mb-2 text-purple-900">Premium Plan</h3>
                        <div class="text-4xl font-bold text-purple-900 mb-2">$29<span class="text-lg">/mo</span></div>
                        <p class="text-purple-700">Advanced features & priority support</p>
                    </div>
                    
                    <ul class="text-left space-y-3 mb-8 opacity-70">
                        <li class="flex items-center text-purple-800">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Everything in Free Plan
                        </li>
                        <li class="flex items-center text-purple-800">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Expanded product catalog
                        </li>
                        <li class="flex items-center text-purple-800">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Custom domain support
                        </li>
                        <li class="flex items-center text-purple-800">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Advanced analytics dashboard
                        </li>
                        <li class="flex items-center text-purple-800">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Priority customer support
                        </li>
                    </ul>
                    
                    <button disabled class="bg-gray-300 text-gray-500 font-semibold rounded-full px-8 py-4 w-full cursor-not-allowed">
                        Coming Soon
                    </button>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift border-2 border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-2 text-primary">Enterprise</h3>
                        <div class="text-4xl font-bold text-primary mb-2">Custom</div>
                        <p class="text-gray-600">Tailored solutions for growing businesses</p>
                    </div>
                    
                    <ul class="text-left space-y-3 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Everything in Premium
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Multiple store management
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            White-label solutions
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Dedicated account manager
                        </li>
                    </ul>
                    
                    <button class="bg-primary text-white font-bold rounded-full px-8 py-4 w-full hover:bg-gray-900 transition duration-300">
                        Contact Sales
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Call to Action -->
    <section id="build" class="py-24 px-6 gradient-bg text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10 max-w-5xl mx-auto">
            <h2 class="text-5xl md:text-6xl font-extrabold mb-6 tracking-tight text-shadow">
                Your Store is Just<br>
                <span class="text-accent">One Click Away</span>
            </h2>
            <p class="text-xl md:text-2xl mb-10 max-w-4xl mx-auto text-gray-200 font-medium leading-relaxed">
                Join thousands of successful entrepreneurs who chose the smart way to build their online business.
            </p>
            <div class="space-y-4 md:space-y-0 md:space-x-6 md:flex md:justify-center md:items-center">
                <a href="{{ session('userid') ? '/dashboard' : '/login' }}" 
                  class="inline-block bg-accent text-primary font-bold text-lg rounded-full px-12 py-5 glow-button transition duration-300">
                    Build My FREE Store Now
                </a>
                <div class="text-gray-300 text-sm">
                    <p>✓ No credit card required</p>
                    <p>✓ Setup in under 5 minutes</p>
                    <p>✓ Free domain included</p>
                </div>
            </div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-10 left-20 w-24 h-24 bg-accent/20 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 right-20 w-32 h-32 bg-purple-500/20 rounded-full blur-xl"></div>
    </section>

                    

  @include('includes.footer')

</body>

</html>
