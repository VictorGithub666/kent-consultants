{{-- resources/views/website/contact.blade.php --}}
@extends('layouts.website')

@section('title', 'Contact Us - Kent Consultants Ltd')
@section('description', 'Get in touch with Kent Consultants Ltd for professional property management services in Nairobi, Kenya.')

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">Contact Us</span>
                <h1>Get in Touch</h1>
                <p class="lead">We're here to help with all your property management needs.</p>
            </div>
        </div>
    </div>
</section>

{{-- Contact Information & Form --}}
<section class="contact-main section">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            {{-- Contact Information --}}
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info-card">
                    <span class="badge-gold">Contact Information</span>
                    <h2>Let's Start a Conversation</h2>
                    <p>
                        Whether you're looking to manage your property, need valuation services, or have a 
                        property management question, our team is ready to assist you.
                    </p>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="method-details">
                                <span class="label">Office Address</span>
                                <p>Sclaters House, Parklands Road<br>Nairobi, Kenya</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="method-details">
                                <span class="label">Phone Numbers</span>
                                <p>
                                    <a href="tel:+254786955170">+254 786 955 170</a><br>
                                    <a href="tel:+254734254796">+254 734 254 796</a>
                                </p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="method-details">
                                <span class="label">Email Address</span>
                                <p>
                                    <a href="mailto:info@kentconsultantsltd.co.ke">info@kentconsultantsltd.co.ke</a>
                                </p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="method-details">
                                <span class="label">Business Hours</span>
                                <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: By appointment</p>
                            </div>
                        </div>
                    </div>

                    <div class="quick-links">
                        <span class="label">Quick Contact</span>
                        <div class="btn-group">
                            <a href="tel:+254786955170" class="btn btn-gold">
                                <i class="bi bi-telephone"></i> Call Us
                            </a>
                            <a href="https://wa.me/254786955170" class="btn btn-outline-gold" target="_blank">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form-wrapper">
                    <div class="form-header">
                        <h3>Send Us a Message</h3>
                        <p>We'll get back to you within 24 hours</p>
                    </div>

                    {{-- Success message (shown after submission) --}}
                    <div id="contact-success" style="display:none;" class="alert alert-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>Message sent!</strong> Thank you for reaching out. We'll get back to you within 24 hours.
                    </div>

                    {{-- Error message --}}
                    <div id="contact-error" style="display:none;" class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <span id="contact-error-text">Something went wrong. Please try again or contact us directly.</span>
                    </div>

                    {{-- Web3Forms: posts directly to their API — no server-side handling needed --}}
                    <form id="contact-form" class="contact-form" novalidate>
                        {{-- Web3Forms access key — replace YOUR_ACCESS_KEY with the key from web3forms.com --}}
                        <input type="hidden" name="access_key" value="{{ config('services.web3forms.key', 'YOUR_ACCESS_KEY') }}">
                        {{-- Customise the email subject line seen in your inbox --}}
                        <input type="hidden" name="subject" value="New Contact Enquiry — Kent Consultants Ltd">
                        {{-- Return JSON so we can handle it in JS --}}
                        <input type="hidden" name="botcheck" style="display:none;">

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Your Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="john@example.com" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                           placeholder="+254 700 000 000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="enquiry_subject">Subject <span class="required">*</span></label>
                                    <input type="text" name="enquiry_subject" id="enquiry_subject" class="form-control"
                                           placeholder="Property Management Inquiry" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Your Message <span class="required">*</span></label>
                                    <textarea name="message" id="message" rows="6" class="form-control"
                                              placeholder="Tell us about your property management needs..." required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="contact-submit-btn" class="btn btn-gold btn-lg">
                                    <i class="bi bi-send"></i>
                                    <span id="btn-text">Send Message</span>
                                    <span id="btn-loading" style="display:none;">
                                        <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                        Sending…
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Map Section --}}
<section class="map-section section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="map-wrapper">
                    <div class="map-placeholder">
                        <div class="map-content">
                            <i class="bi bi-geo-alt-fill"></i>
                            <h3>Find Us</h3>
                            <p>Sclaters House, Parklands Road<br>Nairobi, Kenya</p>
                            <a href="https://maps.google.com/maps?q=Sclaters+House,+Parklands+Road,+Nairobi" 
                               target="_blank" class="btn btn-gold btn-sm">
                                <i class="bi bi-map"></i> Open in Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ Section --}}
<section class="contact-faq section">
    <div class="container section-title" data-aos="fade-up">
        <span class="subtitle">FAQ</span>
        <h2>Frequently Asked Questions</h2>
        <p>Common questions about our property management services</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <div class="faq-header" onclick="toggleFAQ(this)">
                            <h4>What areas do you serve?</h4>
                            <i class="bi bi-plus"></i>
                        </div>
                        <div class="faq-body">
                            <p>We provide property management services across Nairobi and its environs, covering all major residential and commercial areas.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-header" onclick="toggleFAQ(this)">
                            <h4>What types of properties do you manage?</h4>
                            <i class="bi bi-plus"></i>
                        </div>
                        <div class="faq-body">
                            <p>We manage residential properties including estates, apartments, and towers, as well as commercial buildings and warehouses.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-header" onclick="toggleFAQ(this)">
                            <h4>How do you handle tenant issues?</h4>
                            <i class="bi bi-plus"></i>
                        </div>
                        <div class="faq-body">
                            <p>We have a dedicated team that handles all tenant communications, maintenance requests, and dispute resolution professionally and promptly.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-header" onclick="toggleFAQ(this)">
                            <h4>How often do you provide property reports?</h4>
                            <i class="bi bi-plus"></i>
                        </div>
                        <div class="faq-body">
                            <p>We provide monthly financial reports and property status updates to all property owners, ensuring full transparency and accountability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.getElementById('contact-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form       = this;
    const btnText    = document.getElementById('btn-text');
    const btnLoading = document.getElementById('btn-loading');
    const submitBtn  = document.getElementById('contact-submit-btn');
    const successBox = document.getElementById('contact-success');
    const errorBox   = document.getElementById('contact-error');
    const errorText  = document.getElementById('contact-error-text');

    // Simple client-side required field check
    const required = form.querySelectorAll('[required]');
    let valid = true;
    required.forEach(function (field) {
        field.classList.remove('is-invalid');
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            valid = false;
        }
    });
    if (!valid) return;

    // Show loading state
    btnText.style.display    = 'none';
    btnLoading.style.display = 'inline';
    submitBtn.disabled       = true;
    successBox.style.display = 'none';
    errorBox.style.display   = 'none';

    try {
        const data = new FormData(form);
        data.append('from_name', 'Kent Consultants Website');

        const response = await fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            body: data,
        });

        const result = await response.json();

        if (result.success) {
            successBox.style.display = 'block';
            form.reset();
        } else {
            errorText.textContent = result.message || 'Something went wrong. Please try again.';
            errorBox.style.display = 'block';
        }
    } catch (err) {
        errorText.textContent = 'Network error. Please check your connection and try again.';
        errorBox.style.display = 'block';
    } finally {
        btnText.style.display    = 'inline';
        btnLoading.style.display = 'none';
        submitBtn.disabled       = false;
    }
});
</script>
@endpush