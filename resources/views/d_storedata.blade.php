@include('includes.d_head')

<div class="flex-1 overflow-y-auto">
    <main class="flex-1 overflow-y-auto p-6">
        <form action="{{ route('template1.save') }}" method="POST" class="space-y-6">
            @csrf
           
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Right Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Header & Footer Settings</h2>
                    <div class="space-y-5">

                        <!-- Site Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name of Site</label>
                            <input type="text" name="site_name" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                value="{{ old('site_name', $headerFooter->site_name ?? '') }}">
                        </div>

                        <!-- Features -->
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Features</span>
                            <input type="checkbox" name="features" value="1" id="featuresCheck"
                                {{ old('features', $headerFooter->features ?? false) ? 'checked' : '' }}
                                class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        </div>

                        <!-- Brands -->
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Brands</span>
                            <input type="checkbox" name="brands" value="1" id="brandsCheck"
                                {{ old('brands', $headerFooter->brands ?? false) ? 'checked' : '' }}
                                class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        </div>

                        <!-- Collections -->
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Collections</span>
                            <input type="checkbox" name="collections" value="1" id="collectionsCheck"
                                {{ old('collections', $headerFooter->collections ?? false) ? 'checked' : '' }}
                                class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        </div>

                        <!-- Contact -->
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Contact</span>
                            <input type="checkbox" name="contact" value="1" id="contactCheck"
                                {{ old('contact', $headerFooter->contact ?? false) ? 'checked' : '' }}
                                class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        </div>

                        <!-- Footer Text -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Footer Text (small description)</label>
                            <input type="text" name="footer_text" id="footerTextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Enter footer text"
                                value="{{ old('footer_text', $headerFooter->footer_text ?? '') }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>

                <!-- Left Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Main Home Content</h2>
                    <div class="space-y-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Text</label>
                            <input type="text" name="main_text" id="mainTextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Precision Crafted Luxury Timepieces"
                                value="{{ old('main_text', $homeSetting->main_text ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Text</label>
                            <input type="text" name="sub_text" id="subTextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Experience the pinnacle of Swiss watchmaking excellence"
                                value="{{ old('sub_text', $homeSetting->sub_text ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button1 Text</label>
                            <input type="text" name="button1_text" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Discover Collections"
                                value="{{ old('button1_text', $homeSetting->button1_text ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button2 Text</label>
                            <input type="text" name="button2_text" id="button2TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Discover More"
                                value="{{ old('button2_text', $homeSetting->button2_text ?? '') }}">
                        </div>                        
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>


                <!-- Second Left Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Features Section</h2>
                    <div class="space-y-5">

                        <!-- Site Heading -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                            <input type="text" name="main_heading" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="The LuxuryTime Difference"
                                value="{{ old('main_heading', $section1->main_heading ?? '') }}">
                        </div>

                        <!-- Sub Heading -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Heading</label>
                            <input type="text" name="sub_heading" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Why discerning collectors choose our curated selection of timepieces"
                                value="{{ old('sub_heading', $section1->sub_heading ?? '') }}">
                        </div>

                        <!-- Feature 1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Feature Heading</label>
                            <input type="text" name="feature1_heading" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Authenticity Guaranteed"
                                value="{{ old('feature1_heading', $section1->feature1_heading ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Feature Detail</label>
                            <input type="text" name="feature1_detail" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Every watch undergoes rigorous authentication by our Swiss-trained experts."
                                value="{{ old('feature1_detail', $section1->feature1_detail ?? '') }}">
                        </div>

                        <!-- Feature 2 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Second Feature Heading</label>
                            <input type="text" name="feature2_heading" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Extended Warranty"
                                value="{{ old('feature2_heading', $section1->feature2_heading ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Feature Detail</label>
                            <input type="text" name="feature2_detail" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="3-year comprehensive warranty on all purchases for complete peace of mind."
                                value="{{ old('feature2_detail', $section1->feature2_detail ?? '') }}">
                        </div>

                        <!-- Feature 3 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Third Feature Heading</label>
                            <input type="text" name="feature3_heading" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Concierge Service"
                                value="{{ old('feature3_heading', $section1->feature3_heading ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Feature Detail</label>
                            <input type="text" name="feature3_detail" id="siteNameInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Dedicated personal consultants for bespoke shopping experiences."
                                value="{{ old('feature3_detail', $section1->feature3_detail ?? '') }}">
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>

                <!-- Second Right Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Main Brands Logo Section Content</h2>
                    <div class="space-y-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Text</label>
                            <input type="text" name="main_text1" id="mainTextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Our Prestigious Brands"
                                value="{{ old('main_text1', $section2->main_text1 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Text</label>
                            <input type="text" name="sub_text1" id="subTextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Partnering with the most revered names in horology"
                                value="{{ old('sub_text1', $section2->sub_text1 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link1</label>
                            <input type="text" name="image1" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image1', $section2->image1 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link2</label>
                            <input type="text" name="image2" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image2', $section2->image2 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link3</label>
                            <input type="text" name="image3" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image3', $section2->image3 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link4</label>
                            <input type="text" name="image4" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image4', $section2->image4 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link5</label>
                            <input type="text" name="image5" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image5', $section2->image5 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Image Link6</label>
                            <input type="text" name="image6" id="button1TextInput"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Paste the link of the image"
                                value="{{ old('image6', $section2->image6 ?? '') }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>


                <!-- Third Left Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Testimonial Section</h2>
                    <div class="space-y-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Heading</label>
                            <input type="text" name="testi_main" id="testi_main"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="User Testimonials"
                                value="{{ old('testi_main', $testimonial->testi_main ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Text</label>
                            <input type="text" name="testi_sub" id="testi_sub"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Experiences from our community of horology enthusiasts"
                                value="{{ old('testi_sub', $testimonial->testi_sub ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial1</label>
                            <input type="text" name="testi1" id="testi1"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="The authentication process gave me complete confidence in my purchase. My Patek arrived in impeccable condition with all original papers."
                                value="{{ old('testi1', $testimonial->testi1 ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">User Name</label>
                            <input type="text" name="testi_user1" id="testi_user1"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="James Wilson"
                                value="{{ old('testi_user1', $testimonial->testi_user1 ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial2</label>
                            <input type="text" name="testi2" id="testi2"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Exceptional service from start to finish. My consultant helped me find the perfect Rolex Daytona that I'd been searching for years."
                                value="{{ old('testi2', $testimonial->testi2 ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">User Name</label>
                            <input type="text" name="testi_user2" id="testi_user2"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Sarah Johnson"
                                value="{{ old('testi_user2', $testimonial->testi_user2 ?? '') }}">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial3</label>
                            <input type="text" name="testi3" id="testi3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="The after-sales service is unparalleled. When my watch needed servicing, they handled everything seamlessly."
                                value="{{ old('testi3', $testimonial->testi3 ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">User Name</label>
                            <input type="text" name="testi_user3" id="testi_user3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Michael Chen"
                                value="{{ old('testi_user3', $testimonial->testi_user3 ?? '') }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>

                <!-- Third Right Panel - Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-1">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Contact Us Section</h2>
                    <div class="space-y-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Heading</label>
                            <input type="text" name="contact_name" id="contact_name"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Contact Us"
                                value="{{ old('contact_name', $contactUs->contact_name ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sub Heading</label>
                            <input type="text" name="contact_sub" id="contact_sub"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Our watch specialists are available to assist you with any inquiries about our collection or services."
                                value="{{ old('contact_sub', $contactUs->contact_sub ?? '') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="contact_phone" id="contact_phone"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="+91 55555-88888"
                                value="{{ old('contact_phone', $contactUs->contact_phone ?? '') }}">  
                        </div>  
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Office Hours</label>
                            <input type="text" name="contact_hours" id="contact_hours"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Mon-Fri: 9AM-9PM"
                                value="{{ old('contact_hours', $contactUs->contact_hours ?? '') }}">  
                        </div> 
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="text" name="contact_email" id="contact_email"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="concierge@buildyourstore.com"
                                value="{{ old('contact_email', $contactUs->contact_email ?? '') }}">  
                        </div>  

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Office Building Name</label>
                            <input type="text" name="contact_building" id="contact_building"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="Showroom"
                                value="{{ old('contact_building', $contactUs->contact_building ?? '') }}">  
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                            <input type="text" name="contact_line1" id="contact_line1"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="450 Park Avenue"
                                value="{{ old('contact_line1', $contactUs->contact_line1 ?? '') }}">  
                        </div> 
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                            <input type="text" name="contact_line2" id="contact_line2"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder=" New York"
                                value="{{ old('contact_line2', $contactUs->contact_line2 ?? '') }}">  
                        </div> 
                        
                        
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>


                <!-- Website Preview -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 lg:col-span-2">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Website Preview</h2>
                    <div class="border rounded-lg overflow-hidden shadow-sm">

                        <!-- Header Preview -->
                        <header class="bg-white border-b border-gray-200 flex justify-between items-center px-6 py-3">
                            <div class="flex items-center space-x-2 text-yellow-600 font-bold text-xl">
                                
                                <span id="previewSiteName">{{ $headerFooter->site_name ?? 'YourSite' }}</span>
                            </div>
                            <nav class="flex space-x-6 text-gray-700 text-sm font-medium">
                                <a href="#" class="hover:text-yellow-600">Home</a>
                                <a href="#" id="navFeatures" class="{{ !($headerFooter->features ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Features</a>
                                <a href="#" id="navBrands" class="{{ !($headerFooter->brands ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Brands</a>
                                <a href="#" id="navCollections" class="{{ !($headerFooter->collections ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Collection</a>
                                <a href="#" id="navContact" class="{{ !($headerFooter->contact ?? false) ? 'hidden' : '' }} hover:text-yellow-600">Contact</a>
                            </nav>
                        </header>

                        <!-- Content Placeholder -->
                        <div class="h-40 bg-gray-50 flex items-center justify-center text-gray-400 text-sm">
                            Website content preview
                        </div>

                        <!-- Footer Preview -->
                        <footer class="bg-gray-900 text-gray-300 px-6 py-8">
                            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

                                <!-- Dynamic Footer Text -->
                                <div>
                                    <h3 class="text-xl font-bold text-white" id="footerSiteName">
                                        {{ $headerFooter->site_name ?? 'YourSite' }}
                                    </h3>
                                    <p class="mt-2 text-sm" id="dynamicFooterText">
                                        {{ $headerFooter->footer_text ?? 'The premier destination for discerning collectors of fine timepieces.' }}
                                    </p>
                                </div>

                                <!-- Shop Links -->
                                <div>
                                    <h4 class="text-white font-semibold">Shop</h4>
                                    <ul class="mt-2 space-y-1 text-sm">
                                        <li><a href="#" class="hover:text-white">New Arrivals</a></li>
                                        <li><a href="#" class="hover:text-white">Best Sellers</a></li>
                                        <li><a href="#" class="hover:text-white">Limited Editions</a></li>
                                        <li><a href="#" class="hover:text-white">Gift Cards</a></li>
                                    </ul>
                                </div>

                                <!-- Services Links -->
                                <div>
                                    <h4 class="text-white font-semibold">Services</h4>
                                    <ul class="mt-2 space-y-1 text-sm">
                                        <li><a href="#" class="hover:text-white">Brands</a></li>
                                        <li><a href="#" class="hover:text-white">Collections</a></li>
                                        <li><a href="#" class="hover:text-white">Products</a></li>
                                        <li><a href="#" class="hover:text-white">Gifting</a></li>
                                    </ul>
                                </div>

                                <!-- Company Links -->
                                <div>
                                    <h4 class="text-white font-semibold">Company</h4>
                                    <ul class="mt-2 space-y-1 text-sm">
                                        <li><a href="#" class="hover:text-white">About Us</a></li>
                                        <li><a href="#" class="hover:text-white">Locations</a></li>
                                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                                        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="border-t border-gray-700 mt-8 pt-4 text-center text-xs text-gray-500">
                                © 2025 <span id="footerSiteNameCopy">{{ $headerFooter->site_name ?? 'YourSite' }}</span>. 
                                All rights reserved. 
                            </div>
                        </footer>

                    </div>
                </div>

            </div>
        </form>
    </main>
</div>

<script>
    // Live site name update
    document.getElementById('siteNameInput').addEventListener('input', function () {
        document.getElementById('previewSiteName').textContent = this.value || 'YourSite';
    });

    // Live footer text update
    document.getElementById('footerTextInput').addEventListener('input', function () {
        document.getElementById('dynamicFooterText').textContent = this.value || 'The premier destination for discerning collectors of fine timepieces.';
    });

    // Toggle navigation items
    const toggles = [
        { checkbox: 'featuresCheck', nav: 'navFeatures' },
        { checkbox: 'brandsCheck', nav: 'navBrands' },
        { checkbox: 'collectionsCheck', nav: 'navCollections' },
        { checkbox: 'contactCheck', nav: 'navContact' }
    ];
    toggles.forEach(item => {
        document.getElementById(item.checkbox).addEventListener('change', function () {
            document.getElementById(item.nav).classList.toggle('hidden', !this.checked);
        });
    });
</script>

@include('includes.d_footer')
