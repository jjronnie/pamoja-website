<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pamoja Chambers - Professional Debt Collection & Legal Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        .banner-slide {
            opacity: 0;
            transition: opacity 1s ease-in-out;
            position: absolute;
            width: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .banner-slide.active {
            opacity: 1;
            position: absolute;
        }
        
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(139, 0, 0, 0.92) 0%, rgba(0, 0, 0, 0.75) 100%);
        }
        
        .service-card {
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .property-card {
            transition: all 0.3s ease;
        }
        
        .property-card:hover {
            transform: scale(1.03);
        }
        
        .stat-counter {
            font-weight: 700;
        }
        
        /* Container adjustments for better spacing */
        .container {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            .container {
                padding-left: 3rem;
                padding-right: 3rem;
            }
        }
        
        /* Banner adjustments */
        .banner-content-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
            padding: 2rem 1rem;
        }
        
        @media (max-width: 768px) {
            .banner-slide h1 {
                font-size: 2rem;
                line-height: 1.2;
            }
            
            .banner-slide p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto px-6 lg:px-12 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-balance-scale text-red-900 text-2xl md:text-3xl"></i>
                    <span class="text-xl md:text-2xl font-bold text-red-900">Pamoja Chambers</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-red-900 transition">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-red-900 transition">About</a>
                    <a href="#services" class="text-gray-700 hover:text-red-900 transition">Services</a>
                    <a href="#properties" class="text-gray-700 hover:text-red-900 transition">Properties</a>
                    <a href="#contact" class="text-gray-700 hover:text-red-900 transition">Contact</a>
                </div>
                
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="tel:+256123456789" class="flex items-center space-x-2 text-red-900">
                        <i class="fas fa-phone"></i>
                        <span class="text-sm">+256 123 456 789</span>
                    </a>
                    <button class="bg-red-900 text-white px-6 py-2 rounded-lg hover:bg-red-800 transition">
                        Get Started
                    </button>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-red-900 transition py-2">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-red-900 transition py-2">About</a>
                    <a href="#services" class="text-gray-700 hover:text-red-900 transition py-2">Services</a>
                    <a href="#properties" class="text-gray-700 hover:text-red-900 transition py-2">Properties</a>
                    <a href="#contact" class="text-gray-700 hover:text-red-900 transition py-2">Contact</a>
                    <button class="bg-red-900 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition w-full mt-2">
                        Get Started
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Banner with Sliding Messages -->
    <section id="home" class="relative h-screen mt-16 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');"></div>
        <div class="absolute inset-0 gradient-overlay"></div>
        
        <div class="relative h-full flex flex-col items-center justify-center px-4 md:px-8">
            <div class="container mx-auto">
                <div id="banner-slides" class="text-white relative" style="min-height: 400px;">
                    <!-- Slide 1 -->
                    <div class="banner-slide active text-center md:text-left">
                        <p class="text-red-300 text-base md:text-lg mb-2 md:mb-3">WELCOME TO PAMOJA CHAMBERS</p>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Professional Debt<br>Collection Services</h1>
                        <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">We provide comprehensive debt recovery solutions with integrity, professionalism, and a commitment to results.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <button class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                                Our Services
                            </button>
                            <button class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                                <i class="fas fa-play-circle"></i>
                                <span>Learn More</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="banner-slide text-center md:text-left">
                        <p class="text-red-300 text-base md:text-lg mb-2 md:mb-3">LEGAL EXPERTISE YOU CAN TRUST</p>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Court Bailiffs &<br>Legal Consultants</h1>
                        <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">Experienced legal professionals ready to handle your most complex cases with precision and care.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <button class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                                Contact Us
                            </button>
                            <button class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                                <i class="fas fa-gavel"></i>
                                <span>View Cases</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="banner-slide text-center md:text-left">
                        <p class="text-red-300 text-base md:text-lg mb-2 md:mb-3">PROPERTY SOLUTIONS</p>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight">Auctioneering &<br>Property Sales</h1>
                        <p class="text-base md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto md:mx-0">Transparent property auctions and sales services. Find your next opportunity or liquidate assets efficiently.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <button class="bg-red-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-red-800 transition text-base md:text-lg font-semibold">
                                View Properties
                            </button>
                            <button class="bg-white text-red-900 px-6 md:px-8 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition flex items-center justify-center space-x-2 text-base md:text-lg font-semibold">
                                <i class="fas fa-home"></i>
                                <span>Learn More</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Search Form - Centered and Responsive -->
            <div class="w-full max-w-6xl mx-auto mt-8 md:mt-12 px-4">
                <div class="bg-white rounded-xl shadow-2xl p-4 md:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                        <select class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 w-full">
                            <option>Service Type</option>
                            <option>Debt Collection</option>
                            <option>Court Bailiffs</option>
                            <option>Property Sales</option>
                            <option>Legal Consultants</option>
                            <option>Auctioneering</option>
                        </select>
                        <select class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 w-full">
                            <option>Location</option>
                            <option>Kampala</option>
                            <option>Entebbe</option>
                            <option>Jinja</option>
                        </select>
                        <select class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 w-full">
                            <option>Category</option>
                            <option>Commercial</option>
                            <option>Residential</option>
                            <option>Land</option>
                        </select>
                        <button class="bg-red-900 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition font-semibold w-full">
                            Search Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide Indicators -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-100 hover:opacity-100 transition" data-slide="0"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" data-slide="1"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" data-slide="2"></button>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-red-900 py-12 md:py-16">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 text-center text-white">
                <div class="px-4">
                    <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="5000">0</div>
                    <p class="text-red-200 text-sm md:text-base">Cases Handled</p>
                </div>
                <div class="px-4">
                    <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="98">0</div>
                    <p class="text-red-200 text-sm md:text-base">Success Rate %</p>
                </div>
                <div class="px-4">
                    <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="250">0</div>
                    <p class="text-red-200 text-sm md:text-base">Properties Sold</p>
                </div>
                <div class="px-4">
                    <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 stat-counter" data-target="15">0</div>
                    <p class="text-red-200 text-sm md:text-base">Years Experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="order-2 md:order-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="About" class="rounded-2xl shadow-2xl w-full">
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 md:p-6 rounded-xl shadow-xl">
                            <div class="flex items-center space-x-3 md:space-x-4">
                                <i class="fas fa-award text-red-900 text-3xl md:text-4xl"></i>
                                <div>
                                    <p class="text-xl md:text-2xl font-bold text-gray-900">15+</p>
                                    <p class="text-gray-600 text-sm">Years of Excellence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 md:order-2">
                    <p class="text-red-900 font-semibold mb-2">ABOUT US</p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-6">The Leading Debt Collection & Legal Services Provider</h2>
                    <p class="text-gray-600 mb-6">With over 15 years of experience, Pamoja Chambers has established itself as a trusted name in debt collection, legal consultancy, and property services across Uganda. Our team of experienced professionals is dedicated to providing ethical, effective, and efficient solutions.</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Professional Team</h4>
                                <p class="text-gray-600 text-sm">Expert legal professionals</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Ethical Practice</h4>
                                <p class="text-gray-600 text-sm">Transparent operations</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Fast Results</h4>
                                <p class="text-gray-600 text-sm">Quick case resolution</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-red-900 text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">24/7 Support</h4>
                                <p class="text-gray-600 text-sm">Always available</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="bg-red-900 text-white px-6 md:px-8 py-3 rounded-lg hover:bg-red-800 transition font-semibold">
                        Learn More About Us
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 md:py-20 bg-gray-100">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">OUR SERVICES</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Comprehensive Legal & Property Solutions</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We offer a full range of professional services tailored to meet your needs</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Service 1 -->
                <div class="service-card bg-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-file-invoice-dollar text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Debt Collection</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Professional debt recovery services with high success rates. We handle commercial and consumer debts with discretion and efficiency.</p>
                    <a href="#" class="text-red-900 font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card bg-red-900 text-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-white rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-gavel text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Court Bailiffs</h3>
                    <p class="text-red-100 mb-4 md:mb-6 text-sm md:text-base">Licensed court bailiffs executing court orders with professionalism. We ensure legal compliance in all enforcement actions.</p>
                    <a href="#" class="text-white font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card bg-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-home text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Property Sales</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Transparent property transactions and valuations. We help you buy, sell, or value properties at fair market prices.</p>
                    <a href="#" class="text-red-900 font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 4 -->
                <div class="service-card bg-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-balance-scale text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Legal Consultants</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Expert legal advice on civil, commercial, and property matters. Our team provides strategic guidance for complex cases.</p>
                    <a href="#" class="text-red-900 font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 5 -->
                <div class="service-card bg-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-handshake text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Commission Agents</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Reliable commission agent services for property transactions. We facilitate smooth deals between buyers and sellers.</p>
                    <a href="#" class="text-red-900 font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 6 -->
                <div class="service-card bg-white rounded-xl p-6 md:p-8 shadow-lg hover:shadow-2xl">
                    <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <i class="fas fa-hammer text-red-900 text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Auctioneering</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">Professional auction services for properties and assets. Transparent bidding processes with competitive outcomes.</p>
                    <a href="#" class="text-red-900 font-semibold flex items-center space-x-2 hover:underline text-sm md:text-base">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    <section id="properties" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">PROPERTIES</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Featured Listings</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover our latest property listings available for sale or auction</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Property 1 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            For Sale
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kampala, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Luxury Villa in Kololo</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX 850M</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Beautiful 4-bedroom villa with modern amenities in prime location.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bed"></i>
                                <span>4 Beds</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>450 m²</span>
                            </div>
                        </div>
                        <button class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>
                
                <!-- Property 2 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            Auction
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Entebbe, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Commercial Building</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX 1.2B</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Prime commercial property with high rental yield potential.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-building"></i>
                                <span>5 Floors</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-store"></i>
                                <span>8 Units</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>800 m²</span>
                            </div>
                        </div>
                        <button class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>
                
                <!-- Property 3 -->
                <div class="property-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Property" class="w-full h-56 md:h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-red-900 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg font-semibold text-sm">
                            For Sale
                        </div>
                        <div class="absolute bottom-4 left-4 flex items-center space-x-2 text-white text-sm">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jinja, Uganda</span>
                        </div>
                    </div>
                    <div class="p-4 md:p-6">
                        <div class="flex justify-between items-start mb-3 md:mb-4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-900">Modern Apartment</h3>
                            <span class="text-xl md:text-2xl font-bold text-red-900 whitespace-nowrap ml-2">UGX 320M</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm md:text-base">Spacious 3-bedroom apartment in a secure gated community.</p>
                        <div class="flex items-center justify-between text-gray-600 text-xs md:text-sm mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-bath"></i>
                                <span>2 Baths</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-ruler-combined"></i>
                                <span>280 m²</span>
                            </div>
                        </div>
                        <button class="w-full bg-red-900 text-white py-2 md:py-3 rounded-lg hover:bg-red-800 transition font-semibold text-sm md:text-base">
                            View Details
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8 md:mt-12">
                <button class="bg-red-900 text-white px-6 md:px-8 py-3 rounded-lg hover:bg-red-800 transition font-semibold">
                    View All Properties
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 md:py-20 bg-gray-100">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 md:mb-16">
                <p class="text-red-900 font-semibold mb-2">TESTIMONIALS</p>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Don't just take our word for it - hear from our satisfied clients</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"Pamoja Chambers handled our debt collection case with utmost professionalism. They recovered 95% of our outstanding debts within 3 months. Highly recommended!"</p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">David Mukasa</h4>
                            <p class="text-gray-500 text-sm">Business Owner</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"I sold my property through their auction service and got a better price than expected. The entire process was transparent and efficient."</p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Namuli</h4>
                            <p class="text-gray-500 text-sm">Property Owner</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"Their legal consultants provided excellent advice on our commercial dispute. Professional, knowledgeable, and results-oriented. Thank you!"</p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-red-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">James Okello</h4>
                            <p class="text-gray-500 text-sm">CEO, Tech Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');"></div>
        <div class="absolute inset-0 bg-red-900 opacity-95"></div>
        
        <div class="relative container mx-auto px-6 lg:px-12 text-center text-white">
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-4 md:mb-6">Looking for Professional Legal Services?</h2>
            <p class="text-base md:text-xl mb-6 md:mb-8 text-red-100 max-w-2xl mx-auto">Get in touch with our expert team today and let us help you resolve your case efficiently</p>
            <button class="bg-white text-red-900 px-8 md:px-10 py-3 md:py-4 rounded-lg hover:bg-gray-100 transition text-base md:text-lg font-semibold">
                Schedule a Consultation
            </button>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12">
                <!-- Contact Info -->
                <div>
                    <p class="text-red-900 font-semibold mb-2">CONTACT US</p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-6">Get In Touch With Us</h2>
                    <p class="text-gray-600 mb-6 md:mb-8">Have questions or need our services? Reach out to us and we'll respond promptly.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Office Location</h4>
                                <p class="text-gray-600 text-sm md:text-base">Plot 123, Kampala Road, Kampala, Uganda</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Phone Number</h4>
                                <p class="text-gray-600 text-sm md:text-base">+256 123 456 789</p>
                                <p class="text-gray-600 text-sm md:text-base">+256 987 654 321</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email Address</h4>
                                <p class="text-gray-600 text-sm md:text-base">info@pamojachambers.co.ug</p>
                                <p class="text-gray-600 text-sm md:text-base">legal@pamojachambers.co.ug</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-red-900 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Working Hours</h4>
                                <p class="text-gray-600 text-sm md:text-base">Monday - Friday: 8:00 AM - 6:00 PM</p>
                                <p class="text-gray-600 text-sm md:text-base">Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 md:mt-8 flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-red-900 text-white rounded-lg flex items-center justify-center hover:bg-red-800 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8">
                    <form>
                        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Full Name</label>
                                <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Email Address</label>
                                <input type="email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base" placeholder="john@example.com">
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Phone Number</label>
                                <input type="tel" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base" placeholder="+256 123 456 789">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Service Needed</label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
                                    <option>Select Service</option>
                                    <option>Debt Collection</option>
                                    <option>Court Bailiffs</option>
                                    <option>Property Sales</option>
                                    <option>Legal Consultants</option>
                                    <option>Commission Agents</option>
                                    <option>Auctioneering</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4 md:mb-6">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Message</label>
                            <textarea rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base" placeholder="Tell us about your case..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-red-900 text-white py-3 md:py-4 rounded-lg hover:bg-red-800 transition font-semibold text-base md:text-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 md:py-12">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-balance-scale text-red-500 text-2xl md:text-3xl"></i>
                        <span class="text-xl md:text-2xl font-bold">Pamoja Chambers</span>
                    </div>
                    <p class="text-gray-400 mb-4 text-sm md:text-base">Professional debt collection and legal services provider in Uganda. Your trusted partner for justice and results.</p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-900 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">About Us</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Our Services</a></li>
                        <li><a href="#properties" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Properties</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-4">Our Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Debt Collection</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Court Bailiffs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Property Sales</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Legal Consultants</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition text-sm md:text-base">Auctioneering</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4 text-sm md:text-base">Subscribe to our newsletter for updates and legal insights.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 bg-gray-800 border border-gray-700 rounded-l-lg px-3 md:px-4 py-2 md:py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
                        <button class="bg-red-900 px-4 md:px-6 rounded-r-lg hover:bg-red-800 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-6 md:pt-8 text-center text-gray-400 text-sm md:text-base">
                <p>&copy; 2025 Pamoja Chambers. All rights reserved. | Designed with excellence</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 md:bottom-8 right-6 md:right-8 w-12 h-12 bg-red-900 text-white rounded-full shadow-lg hover:bg-red-800 transition hidden items-center justify-center z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Banner Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.banner-slide');
        const indicators = document.querySelectorAll('.slide-indicator');
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                indicators[i].classList.remove('opacity-100');
                indicators[i].classList.add('opacity-50');
            });
            
            slides[index].classList.add('active');
            indicators[index].classList.remove('opacity-50');
            indicators[index].classList.add('opacity-100');
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        
        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);
        
        // Manual slide control
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Counter Animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        }
        
        // Intersection Observer for counters
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.stat-counter').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Back to Top Button
        const backToTopBtn = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove('hidden');
                backToTopBtn.classList.add('flex');
            } else {
                backToTopBtn.classList.add('hidden');
                backToTopBtn.classList.remove('flex');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth Scroll for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    const offset = 80; // Height of fixed navbar
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Navbar scroll effect
        const nav = document.querySelector('nav');
        let lastScroll = 0;
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;
            
            if (currentScroll > 100) {
                nav.classList.add('shadow-xl');
            } else {
                nav.classList.remove('shadow-xl');
            }
            
            lastScroll = currentScroll;
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Prevent body scroll when mobile menu is open
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    if (!isHidden && window.innerWidth < 1024) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                }
            });
        });

        observer.observe(mobileMenu, { attributes: true });

        // Add loading animation to forms
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Sending...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    submitBtn.textContent = 'Message Sent!';
                    setTimeout(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                        form.reset();
                    }, 2000);
                }, 1500);
            });
        });

        // Add entrance animations on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.service-card, .property-card, .bg-white.rounded-xl');
            
            const scrollObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '0';
                        entry.target.style.transform = 'translateY(20px)';
                        
                        setTimeout(() => {
                            entry.target.style.transition = 'all 0.6s ease';
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, 100);
                        
                        scrollObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            
            elements.forEach(el => scrollObserver.observe(el));
        };

        // Initialize animations after page load
        window.addEventListener('load', animateOnScroll);

        // Keyboard navigation for accessibility
        document.addEventListener('keydown', (e) => {
            // ESC key closes mobile menu
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
            
            // Enter key on indicators changes slides
            if (e.key === 'Enter' && e.target.classList.contains('slide-indicator')) {
                const slideIndex = parseInt(e.target.getAttribute('data-slide'));
                currentSlide = slideIndex;
                showSlide(currentSlide);
            }
        });

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (window.innerWidth >= 1024) {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }, 250);
        });

        // Lazy load images (optional enhancement)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Add ripple effect to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s ease-out';
                ripple.style.pointerEvents = 'none';
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation via style tag
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        console.log('Pamoja Chambers website loaded successfully!');
    </script>
</body>
</html>