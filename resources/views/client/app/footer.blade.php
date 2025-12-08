<footer class="footer-premium" id="contact">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="footer-section">
                    <h5 class="footer-title mb-3">
                        <i class="fas fa-coffee me-2"></i>MyCafe
                    </h5>
                    <p class="footer-text">Experience the best food and drinks in a cozy, premium café atmosphere.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-section">
                    <h5 class="footer-title mb-3">Quick Links</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('home') }}" class="footer-link">
                            <i class="fas fa-chevron-right me-2"></i>Home
                        </a>
                        <a href="#contact" class="footer-link">
                            <i class="fas fa-chevron-right me-2"></i>Contact
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-section">
                    <h5 class="footer-title mb-3">Contact Info</h5>
                    <div class="d-flex flex-column gap-2">
                        <p class="footer-text mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i> 123 Café Street, City
                        </p>
                        <p class="footer-text mb-0">
                            <i class="fas fa-envelope me-2"></i> info@mycafe.com
                        </p>
                        <p class="footer-text mb-0">
                            <i class="fas fa-phone me-2"></i> +123 456 7890
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="footer-divider my-4">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="footer-copy mb-0">
                    <i class="fas fa-copyright me-1"></i> 2025 MyCafe. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="social-links">
                    {{-- TIKTOK düwmesi goşuldy --}}
                    <a href="#" class="footer-social" aria-label="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* CSS kodunyň hemmesi üýtgedilmezden galdy */
    .footer-premium {
        background: linear-gradient(180deg, rgba(17, 17, 17, 0.98), rgba(26, 26, 26, 0.98), rgba(34, 34, 34, 0.98));
        color: #ececec;
        padding: 60px 0 30px;
        border-top: 2px solid rgba(255, 215, 90, 0.3);
        font-family: 'Poppins', sans-serif;
        position: relative;
    }

    .footer-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 90, 0.5), transparent);
    }

    .footer-section {
        padding: 1rem;
        border-radius: 12px;
        background: rgba(255, 215, 90, 0.02);
        border: 1px solid rgba(255, 215, 90, 0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .footer-section:hover {
        background: rgba(255, 215, 90, 0.05);
        border-color: rgba(255, 215, 90, 0.15);
        transform: translateY(-5px);
    }

    .footer-title {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.4rem;
        text-shadow: 0 0 15px rgba(255, 215, 90, 0.6);
        transition: all 0.3s ease;
    }

    .footer-section:hover .footer-title {
        text-shadow: 0 0 20px rgba(255, 215, 90, 0.8);
        transform: translateX(5px);
    }

    .footer-text {
        color: rgba(255, 215, 90, 0.7);
        line-height: 1.8;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .footer-section:hover .footer-text {
        color: rgba(255, 215, 90, 0.85);
    }

    .footer-text i {
        color: #ffd95a;
        width: 20px;
    }

    .footer-link {
        color: rgba(255, 215, 90, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        padding: 0.5rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .footer-link i {
        transition: transform 0.3s ease;
        font-size: 0.75rem;
    }

    .footer-link:hover {
        color: #fff7c2;
        background: rgba(255, 215, 90, 0.1);
        padding-left: 1rem;
        text-shadow: 0 0 10px rgba(255, 215, 90, 0.8);
    }

    .footer-link:hover i {
        transform: translateX(5px);
    }

    .footer-divider {
        border-color: rgba(255, 215, 90, 0.2);
        opacity: 1;
        margin: 2rem 0 !important;
    }

    .footer-copy {
        color: rgba(255, 215, 90, 0.6);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .footer-copy i {
        color: #ffd95a;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    @media (min-width: 768px) {
        .social-links {
            justify-content: flex-end;
        }
    }

    .footer-social {
        width: 45px;
        height: 45px;
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        color: #111 !important;
        background: linear-gradient(135deg, #ffd95a, #ffed4e) !important;
        border: 2px solid #ffd95a !important;
        border-radius: 50%;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 15px rgba(255, 215, 90, 0.4);
    }

    .footer-social i {
        position: relative;
        z-index: 2;
        color: #111;
    }

    .footer-social:hover {
        color: #111 !important;
        background: linear-gradient(135deg, #ffed4e, #ffd95a) !important;
        border-color: #ffed4e !important;
        transform: translateY(-8px) scale(1.15);
        box-shadow: 0 8px 25px rgba(255, 215, 90, 0.7);
    }

    @media (max-width: 767px) {
        .footer-premium {
            padding: 40px 0 20px;
        }

        .footer-section {
            margin-bottom: 1rem;
        }
    }
</style>