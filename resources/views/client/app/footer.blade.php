<footer class="footer-premium" id="contact">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4 mt-3">
                <h5 class="footer-title">MyCafe</h5>
                <p class="footer-text">Experience the best food and drinks in a cozy, premium café atmosphere.</p>
            </div>
            <div class="col-md-4 mt-3">
                <h5 class="footer-title">Quick Links</h5>
                <p><a href="{{ route('home') }}" class="footer-link">Home</a></p>
                <p><a href="#contact" class="footer-link">Contact</a></p>
            </div>
            <div class="col-md-4 mt-3">
                <h5 class="footer-title">Contact</h5>
                <p class="footer-text"><i class="bi bi-geo-alt-fill"></i> 123 Café Street, City</p>
                <p class="footer-text"><i class="bi bi-envelope-fill"></i> info@mycafe.com</p>
                <p class="footer-text"><i class="bi bi-telephone-fill"></i> +123 456 7890</p>
            </div>
        </div>

        <hr class="my-4" style="border-color: rgba(255,255,255,0.12)">

        <div class="row align-items-center">
            <div class="col-md-7">
                <p class="footer-copy mb-0">© 2025 MyCafe. All Rights Reserved.</p>
            </div>
            <div class="col-md-5 text-center text-md-end">
                <a href="#" class="footer-social"><i class="bi bi-facebook"></i></a>
                <a href="#" class="footer-social"><i class="bi bi-twitter"></i></a>
                <a href="#" class="footer-social"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-premium {
        background: linear-gradient(180deg, rgba(17, 17, 17, 0.95), rgba(26, 26, 26, 0.95), rgba(34, 34, 34, 0.95));
        color: #ececec;
        padding: 50px 0;
        border-top: 1px solid rgba(255, 193, 7, 0.18);
        font-family: 'Poppins', sans-serif;
    }

    .footer-title {
        color: #ffd95a;
        font-weight: 700;
        font-size: 1.3rem;
        text-shadow: 0 0 10px rgba(255, 193, 7, .6);
    }

    .footer-text,
    .footer-copy {
        color: #d5d7dd;
    }

    .footer-link {
        color: #e5e5e5;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .footer-link:hover {
        color: #ffd95a;
        text-shadow: 0 0 10px rgba(255, 193, 7, .8);
        padding-left: 4px;
    }

    .footer-social {
        color: #dcdcdc;
        font-size: 1.35rem;
        margin-left: 12px;
        transition: .3s ease;
    }

    .footer-social:hover {
        color: #ffd95a;
        transform: translateY(-5px) scale(1.15);
        text-shadow: 0 0 18px rgba(255, 193, 7, .9);
    }
</style>