@extends('client.layouts.app')

@section('title')
{{ __('app.home') }}
@endsection

@section('content')

@php
$locale = app()->getLocale();
$nameField = ($locale === 'en') ? 'name' : 'name_' . $locale;
$descField = ($locale === 'en') ? 'description' : 'description_' . $locale;
@endphp

<div class="bg-dark text-light py-5">
    <div class="container">
        <div class="banner-wrapper text-center pb-5">
            <canvas id="banner" width="1200" height="400"></canvas>
        </div>

        <div class="text-center my-5 fade-in pt-5">
            <h2 class="header-gold header-subtitl welcome-title mb-4 fw-bold">
                Welcome to MyCafe
            </h2>

            <p class="header-subtitle fs-5 px-md-5 mx-md-5 lh-lg">
                MyCafe delivers an exceptional dining experience with premium coffee and carefully crafted meals.
                Our commitment to quality ingredients, expert preparation, and outstanding service sets us apart
                as a premier destination for food and beverage excellence.
            </p>
        </div>

        <div class="row my-5 fade-in g-4">
            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-cup-hot-fill fs-1 text-warning"></i>
                    </div>
                    <h4 class="text-light mb-3 fw-bold">Premium Coffee</h4>
                    <p class="text-gold-fade lh-lg">Expertly sourced beans from renowned plantations worldwide, roasted to perfection and brewed fresh daily by certified baristas.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-award-fill fs-1 text-warning"></i>
                    </div>
                    <h4 class="text-light mb-3 fw-bold">Quality Assurance</h4>
                    <p class="text-gold-fade lh-lg">Every dish undergoes rigorous quality control, ensuring consistent excellence in taste, presentation, and nutritional value.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-clock-history fs-1 text-warning"></i>
                    </div>
                    <h4 class="text-light mb-3 fw-bold">Efficient Service</h4>
                    <p class="text-gold-fade lh-lg">Professional staff trained to deliver prompt, courteous service while maintaining the highest standards of food safety and quality.</p>
                </div>
            </div>
        </div>

        <div class="about-section my-5 py-5 fade-in">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <h3 class="header-gold fw-bold display-5 mb-4">Our Heritage</h3>
                    <p class="text-gold-fade fs-6 mb-4 lh-lg">
                        Established in 2020, MyCafe has built a reputation for culinary excellence and exceptional service.
                        What began as a vision to create a distinguished dining establishment has evolved into a recognized
                        leader in the food and beverage industry.
                    </p>
                    <p class="text-gold-fade lh-lg mb-4">
                        Our philosophy centers on three core principles: sourcing premium ingredients, employing skilled
                        culinary professionals, and maintaining unwavering commitment to customer satisfaction. Each team
                        member is dedicated to upholding these standards in every interaction.
                    </p>
                    <p class="text-gold-fade lh-lg">
                        Today, MyCafe serves a diverse clientele, from business professionals to families, each receiving
                        the same level of attention and quality that has become our hallmark.
                    </p>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="stats-grid">
                        <div class="stat-card p-4 mb-3">
                            <h2 class="text-warning fw-bold display-4 mb-2">5,000+</h2>
                            <p class="text-light mb-0 fs-6">Satisfied Customers</p>
                        </div>
                        <div class="stat-card p-4 mb-3">
                            <h2 class="text-warning fw-bold display-4 mb-2">50+</h2>
                            <p class="text-light mb-0 fs-6">Curated Menu Items</p>
                        </div>
                        <div class="stat-card p-4 mb-3">
                            <h2 class="text-warning fw-bold display-4 mb-2">4.9/5</h2>
                            <p class="text-light mb-0 fs-6">Customer Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-preview my-5 py-5 fade-in">
            <div class="text-center mb-5">
                <h3 class="fw-bold display-4 mb-3">
                    <span class="header-gold">Featured</span>
                    <span class="header-white"> Offerings</span>
                </h3>
                <p class="header-subtitle fs-5 lh-lg">
                    Explore our signature selections, each prepared with precision and presented with care
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12 col-sm-6 col-md-3 fade-up">
                    <div class="card premium-card shadow-lg border-0 h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-cup-straw fs-1 text-warning mb-3"></i>
                            <h5 class="card-title fw-bold mb-3">Classic Cappuccino</h5>
                            <p class="price-tag mb-2">$5.00</p>
                            <small class="text-gold-fade">Premium espresso with artisan steamed milk</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 fade-up">
                    <div class="card premium-card shadow-lg border-0 h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-egg-fried fs-1 text-warning mb-3"></i>
                            <h5 class="card-title fw-bold mb-3">Continental Breakfast</h5>
                            <small class="text-gold-fade">Farm-fresh eggs with artisan toast and select sides</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 fade-up">
                    <div class="card premium-card shadow-lg border-0 h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-cake2 fs-1 text-warning mb-3"></i>
                            <h5 class="card-title fw-bold mb-3">Signature Dessert</h5>
                            <small class="text-gold-fade">Belgian chocolate layer cake with premium cocoa</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 fade-up">
                    <div class="card premium-card shadow-lg border-0 h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-egg-fill fs-1 text-warning mb-3"></i>
                            <h5 class="card-title fw-bold mb-3">Garden Salad</h5>
                            <small class="text-gold-fade">Organic greens with house-crafted vinaigrette</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="why-choose-us my-5 py-5 fade-in">
            <h3 class="text-center fw-bold display-4 mb-5">
                <span class="header-gold">Our Distinctions</span>
            </h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="reason-card p-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-warning fs-3 me-3 mt-1"></i>
                            <div>
                                <h5 class="text-light fw-bold mb-3">Premium Sourcing</h5>
                                <p class="text-gold-fade mb-0 lh-lg">Strategic partnerships with certified suppliers ensure consistent access to the finest ingredients available in the market.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-card p-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-warning fs-3 me-3 mt-1"></i>
                            <div>
                                <h5 class="text-light fw-bold mb-3">Culinary Expertise</h5>
                                <p class="text-gold-fade mb-0 lh-lg">Our professionally trained chefs bring decades of combined experience in fine dining and international cuisine.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-card p-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-warning fs-3 me-3 mt-1"></i>
                            <div>
                                <h5 class="text-light fw-bold mb-3">Refined Ambiance</h5>
                                <p class="text-gold-fade mb-0 lh-lg">Thoughtfully designed interior spaces create an atmosphere conducive to both professional meetings and personal gatherings.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-card p-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-warning fs-3 me-3 mt-1"></i>
                            <div>
                                <h5 class="text-light fw-bold mb-3">Value Proposition</h5>
                                <p class="text-gold-fade mb-0 lh-lg">Competitive pricing structure ensures premium quality remains accessible without compromising on standards or service.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonial-section my-5 py-5 fade-in">
            <h3 class="text-center fw-bold display-4 mb-5">
                <span class="header-gold">Client Testimonials</span>
            </h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="text-light mb-4 lh-lg">"Exceptional quality and service. The consistency in their coffee preparation is remarkable, and the professional atmosphere makes it ideal for client meetings."</p>
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle me-3">JD</div>
                            <div>
                                <p class="text-warning fw-bold mb-0">John Doe</p>
                                <small class="text-muted">Business Executive</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="text-light mb-4 lh-lg">"Outstanding culinary execution across the entire menu. The attention to detail in both preparation and presentation reflects true professional standards."</p>
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle me-3">JS</div>
                            <div>
                                <p class="text-warning fw-bold mb-0">Jane Smith</p>
                                <small class="text-muted">Culinary Critic</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="text-light mb-4 lh-lg">"Reliable establishment with excellent service standards. The staff demonstrates professionalism while maintaining a welcoming atmosphere suitable for families."</p>
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle me-3">MJ</div>
                            <div>
                                <p class="text-warning fw-bold mb-0">Michael Johnson</p>
                                <small class="text-muted">Regular Patron</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="opening-hours my-5 py-5 fade-in">

            <!-- TITLE -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3 class="header-gold fw-bold display-5 mb-3">
                        Hours of Operation
                    </h3>
                    <p class="text-light fs-6 lh-lg mb-0">
                        Our establishment maintains regular hours to serve your dining and beverage needs throughout the week.
                    </p>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="row align-items-stretch">

                <!-- HOURS -->
                <div class="col-md-6 mb-4">
                    <div class="h-100 d-flex flex-column justify-content-between gap-3">

                        <div class="hour-item p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-light fw-bold fs-6">
                                    <i class="bi bi-calendar-week text-warning me-2"></i>
                                    Monday – Tuesday
                                </span>
                                <span class="text-warning fw-bold">
                                    <i class="bi bi-clock me-1"></i>
                                    07:00 – 22:00
                                </span>
                            </div>
                        </div>

                        <div class="hour-item p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-light fw-bold fs-6">
                                    <i class="bi bi-calendar-event text-warning me-2"></i>
                                    Wednesday - Thursday
                                </span>
                                <span class="text-warning fw-bold">
                                    <i class="bi bi-clock me-1"></i>
                                    08:00 – 23:00
                                </span>
                            </div>
                        </div>

                        <div class="hour-item p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-light fw-bold fs-6">
                                    <i class="bi bi-calendar-heart text-warning me-2"></i>
                                    Friday - Saturday - Sunday
                                </span>
                                <span class="text-warning fw-bold">
                                    <i class="bi bi-clock me-1"></i>
                                    09:00 – 21:00
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- CONTACT -->
                <div class="col-md-6 mb-4">
                    <div class="contact-info-box p-5 h-100 d-flex flex-column justify-content-between">

                        <div>
                            <h4 class="text-warning fw-bold mb-4 fs-4">
                                Contact Information
                            </h4>

                            <div class="contact-item mb-4">
                                <i class="bi bi-geo-alt-fill text-warning me-3 fs-5"></i>
                                <span class="text-light">
                                    123 Coffee Street, Downtown District
                                </span>
                            </div>

                            <div class="contact-item mb-4">
                                <i class="bi bi-telephone-fill text-warning me-3 fs-5"></i>
                                <span class="text-light">
                                    +1 (555) 123-4567
                                </span>
                            </div>

                            <div class="contact-item">
                                <i class="bi bi-envelope-fill text-warning me-3 fs-5"></i>
                                <span class="text-light">
                                    contact@mycafe.com
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="cta-section text-center my-5 py-5 fade-in">
            <h2 class="header-gold fw-bold mb-4 display-4">Begin Your MyCafe Experience</h2>
            <p class="header-subtitle fs-5 mb-5 px-md-5 lh-lg">Discover why discerning customers choose MyCafe for premium dining and beverage service. Browse our curated menu and place your order today.</p>
            <a href="{{ route('client.categories.index') }}" class="btn btn-warning btn-lg px-5 py-3 fw-bold">
                View Menu & Order
            </a>
        </div>
    </div>
</div>

<style>
    .header-subtitle {
        font-family: "Georgia", serif;
    }

    .welcome-title {
        font-family: "Georgia", "Times New Roman", serif;
        font-size: clamp(2.8rem, 5vw, 3.5rem);
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .banner-wrapper {
        margin: 2rem 0;
    }

    #banner {
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        max-width: 100%;
        height: auto;
    }

    .feature-card {
        background: linear-gradient(180deg, #1a1a1a, #222);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.15);
        transition: 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255, 215, 90, 0.4);
        box-shadow: 0 10px 30px rgba(255, 215, 90, 0.2);
    }

    .icon-wrapper {
        display: inline-block;
        padding: 1rem;
        border-radius: 50%;
        background: rgba(255, 215, 90, 0.1);
    }

    .stat-card {
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.2);
        text-align: center;
        transition: 0.3s ease;
    }

    .stat-card:hover {
        transform: scale(1.05);
        border-color: rgba(255, 215, 90, 0.5);
    }

    .reason-card {
        background: linear-gradient(135deg, #1a1a1a, #222);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.15);
        height: 100%;
        transition: 0.3s ease;
    }

    .reason-card:hover {
        border-color: rgba(255, 215, 90, 0.3);
        transform: translateX(10px);
    }

    .testimonial-card {
        background: linear-gradient(180deg, #1a1a1a, #222);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.15);
        height: 100%;
        transition: 0.3s ease;
    }

    .testimonial-card:hover {
        border-color: rgba(255, 215, 90, 0.4);
        transform: translateY(-5px);
    }

    .avatar-circle {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ffd95a, #f4a261);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #1a1a1a;
        flex-shrink: 0;
    }

    .hour-item {
        background: linear-gradient(90deg, #1a1a1a, #222);
        border-radius: 8px;
        border: 1px solid rgba(255, 215, 90, 0.15);
    }

    .contact-info-box {
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 90, 0.2);
        height: 100%;
    }

    .contact-item {
        display: flex;
        align-items: center;
    }

    .social-icon {
        color: #ffd95a;
        transition: 0.3s ease;
        display: inline-block;
    }

    .social-icon:hover {
        color: #fff7c2;
        transform: translateY(-3px);
    }

    .cta-section {
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a, #1a1a1a);
        border-radius: 20px;
        padding: 4rem 3rem;
        border: 2px solid rgba(255, 215, 90, 0.3);
    }

    .premium-card {
        background: linear-gradient(180deg, #1a1a1a, #222, #2a2a2a);
        color: #f8f9fa;
        border-radius: 14px;
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
        border: 1px solid rgba(255, 215, 90, 0.15);
    }

    .premium-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(255, 215, 90, 0.3), 0 0 80px rgba(255, 215, 90, 0.1);
        border-color: rgba(255, 215, 90, 0.6);
    }

    .premium-card .card-title {
        color: #ffd95a;
        transition: 0.3s ease;
    }

    .premium-card:hover .card-title {
        color: #fff7c2;
        text-shadow: 0 0 12px rgba(255, 215, 90, 1);
    }

    .price-tag {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.2rem;
        transition: 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-card:hover .price-tag {
        color: #fff7c2;
        text-shadow: 0 0 8px rgba(255, 215, 90, 1);
    }

    .text-gold-fade {
        color: rgba(255, 215, 90, 0.75) !important;
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .premium-card:hover .text-gold-fade {
        color: #fff7c2;
        text-shadow: 0 0 6px rgba(255, 215, 90, 0.8);
    }

    .header-gold {
        color: #ffd95a;
        text-shadow: 0 0 12px rgba(255, 215, 90, 0.8);
    }

    .header-white {
        color: #f8f9fa;
    }

    .header-subtitle {
        color: #d7deea;
    }

    .fade-up,
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('banner');
        const ctx = canvas.getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#1a1a1a');
        gradient.addColorStop(0.5, '#2a2a2a');
        gradient.addColorStop(1, '#111111');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.shadowColor = 'rgba(255, 217, 90, 0.5)';
        ctx.shadowBlur = 50;
        ctx.fillStyle = '#ffd95a';
        ctx.font = 'bold 120px "Georgia", serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('MyCafe', canvas.width / 2, canvas.height / 2 - 40);

        ctx.shadowBlur = 0;
        ctx.fillStyle = '#f4a261';
        ctx.font = '32px "Georgia", serif';
        ctx.fillText('Premium Dining & Coffee', canvas.width / 2, canvas.height / 2 + 40);

        ctx.strokeStyle = '#ffd95a';
        ctx.lineWidth = 4;
        ctx.globalAlpha = 0.25;
        ctx.shadowBlur = 20;
        ctx.strokeRect(30, 30, canvas.width - 60, canvas.height - 60);

        const elements = document.querySelectorAll(".fade-up, .fade-in");
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }
            });
        }, {
            threshold: 0.2
        });
        elements.forEach(el => observer.observe(el));
    });
</script>

@endsection