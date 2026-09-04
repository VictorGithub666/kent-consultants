{{-- resources/views/v2/contact.blade.php --}}
@extends('layouts.website2')

@section('title', 'Contact Us - Kent Consultants Ltd')
@section('description', 'Get in touch with Kent Consultants Ltd for professional property management services in Nairobi, Kenya.')
@section('body_class', 'contact-page')
@section('nav_contact', 'active')

@section('content')

{{-- Page Header --}}
<div class="kc2-page-header">
    <div class="container text-center">
        <h1>Contact Us</h1>
        <p>We&rsquo;re Here to Help</p>
    </div>
</div>

{{-- Contact --}}
<section id="contact" class="contact section kc2-section-even">

    <div class="container section-title" data-aos="fade-up">
        <h2>Get In Touch</h2>
        <p>We&rsquo;d Love to Hear from You</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            {{-- Info --}}
            <div class="col-lg-4">

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Sclaters House, Parklands Road<br>Nairobi, Kenya</p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>
                            <a href="tel:+254786955170">+254 786 955 170</a><br>
                            <a href="tel:+254734254796">+254 734 254 796</a>
                        </p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="350">
                    <i class="bi bi-whatsapp flex-shrink-0"></i>
                    <div>
                        <h3>WhatsApp</h3>
                        <p><a href="https://wa.me/254734476303" target="_blank" rel="noopener">+254 734 476 303</a></p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p><a href="mailto:info@kentconsultantsltd.co.ke">info@kentconsultantsltd.co.ke</a></p>
                    </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="450">
                    <i class="bi bi-clock flex-shrink-0"></i>
                    <div>
                        <h3>Business Hours</h3>
                        <p>Monday – Friday: 8:00 AM – 5:00 PM<br>Saturday: By appointment</p>
                    </div>
                </div>

            </div>

            {{-- Form --}}
            <div class="col-lg-8">
                <form id="kc2-contact-form" class="php-email-form" data-aos="fade-up" data-aos-delay="200" novalidate>
                    <input type="hidden" name="access_key" value="{{ config('services.web3forms.key', '') }}">
                    <input type="hidden" name="subject" value="New Contact Enquiry — Kent Consultants Ltd">
                    <input type="hidden" name="botcheck" style="display:none">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text"  name="name"          class="form-control" placeholder="Your Name"     required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email"         class="form-control" placeholder="Your Email"    required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel"   name="phone"         class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-md-6">
                            <input type="text"  name="subject_line"  class="form-control" placeholder="Subject"       required>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" class="form-control" rows="6" placeholder="Tell us about your property management needs…" required></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Sending…</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>

{{-- FAQ --}}
<section class="faq section kc2-section-odd">

    <div class="container section-title" data-aos="fade-up">
        <h2>FAQ</h2>
        <p>Frequently Asked Questions</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="custom-accordion" id="contact-faq">

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq-1" aria-expanded="true">
                                What areas do you serve?
                            </button>
                        </h2>
                        <div id="cfaq-1" class="collapse show" data-parent="#contact-faq">
                            <div class="accordion-body">
                                We provide property management services across Nairobi and its environs, covering all major residential and commercial areas.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq-2">
                                What types of properties do you manage?
                            </button>
                        </h2>
                        <div id="cfaq-2" class="collapse" data-parent="#contact-faq">
                            <div class="accordion-body">
                                We manage residential estates, apartments and towers, commercial buildings, office blocks and warehouses.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq-3">
                                How do you handle maintenance and repairs?
                            </button>
                        </h2>
                        <div id="cfaq-3" class="collapse" data-parent="#contact-faq">
                            <div class="accordion-body">
                                We coordinate all maintenance through vetted contractors and service providers, with prompt response for emergencies and scheduled preventative maintenance programmes.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq-4">
                                How quickly can you respond to enquiries?
                            </button>
                        </h2>
                        <div id="cfaq-4" class="collapse" data-parent="#contact-faq">
                            <div class="accordion-body">
                                We respond to all enquiries within 24 business hours. For urgent matters please call us directly on +254 786 955 170.
                            </div>
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
document.getElementById('kc2-contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form    = this;
    const loading = form.querySelector('.loading');
    const errBox  = form.querySelector('.error-message');
    const sentBox = form.querySelector('.sent-message');
    const btn     = form.querySelector('button[type=submit]');

    let valid = true;
    form.querySelectorAll('[required]').forEach(function(f) {
        f.classList.remove('is-invalid');
        if (!f.value.trim()) { f.classList.add('is-invalid'); valid = false; }
    });
    if (!valid) return;

    loading.style.display = 'block';
    btn.disabled = true;
    errBox.style.display = sentBox.style.display = 'none';

    try {
        const res  = await fetch('https://api.web3forms.com/submit', { method: 'POST', body: new FormData(form) });
        const data = await res.json();
        if (data.success) {
            sentBox.style.display = 'block';
            form.reset();
        } else {
            errBox.textContent = data.message || 'Something went wrong. Please try again.';
            errBox.style.display = 'block';
        }
    } catch(err) {
        errBox.textContent = 'Network error. Please check your connection.';
        errBox.style.display = 'block';
    } finally {
        loading.style.display = 'none';
        btn.disabled = false;
    }
});
</script>
@endpush
