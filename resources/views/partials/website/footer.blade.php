{{-- resources/views/partials/website/footer.blade.php --}}
<footer id="footer" class="footer dark-background">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="footer-content">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd" class="footer-logo">
                        <span class="sitename" >Kent Consultants</span>
                    </a>
                    <p class="mb-4">
                        Professional property management, consultancy and real estate solutions 
                        designed to protect and maximize the value of your investment since 2008.
                    </p>
                    
                    <div class="social-links">
                        <a href="https://www.facebook.com/KentConsultantsLtd/" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/kent_consultants_ltd/" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('properties.index') }}"><i class="bi bi-chevron-right"></i> Properties</a></li>
                        <li><a href="{{ route('careers.index') }}"><i class="bi bi-chevron-right"></i> Careers</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <div class="footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right"></i> Property Management</a></li>
                        <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right"></i> Project Management</a></li>
                        <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right"></i> Property Valuation</a></li>
                        <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right"></i> Consultancy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="footer-contact">
                    <h4>Contact Information</h4>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="contact-info">
                            <p>Sclaters House, Parklands Road<br>Nairobi, Kenya</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="contact-info">
                            <p>+254 786 955 170<br>+254 734 254 796</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="contact-info">
                            <p>info@kentconsultantsltd.co.ke</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            &copy; <span>Copyright</span> 
                            <strong class="px-1">Kent Consultants Ltd</strong> 
                            <span>All Rights Reserved</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-bottom-links">
                        <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                        <a href="{{ route('terms.service') }}">Terms of Service</a>
                        <a href="{{ route('cookie.policy') }}">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>