{{-- resources/views/website/privacy-policy.blade.php --}}
@extends('layouts.website2')

@section('title', 'Privacy Policy - Kent Consultants Ltd')
@section('description', 'Privacy Policy for Kent Consultants Ltd - Learn how we protect your personal information.')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-gold">Privacy</span>
                <h1>Privacy Policy</h1>
                <p class="lead">How we collect, use, and protect your personal information</p>
            </div>
        </div>
    </div>
</section>

<section class="legal-content section">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="legal-card">
                    <p class="text-muted"><strong>Last Updated:</strong> August 20, 2026</p>

                    <h2>1. Introduction</h2>
                    <p>
                        Kent Consultants Ltd ("we", "our", "us") respects your privacy and is committed to protecting your personal data. 
                        This privacy policy will inform you about how we look after your personal data when you visit our website and 
                        tell you about your privacy rights and how the law protects you.
                    </p>

                    <h2>2. Information We Collect</h2>
                    <p>We may collect, use, store and transfer different kinds of personal data about you including:</p>
                    <ul>
                        <li><strong>Identity Data:</strong> Name, title, date of birth, and gender.</li>
                        <li><strong>Contact Data:</strong> Email address, telephone numbers, and physical address.</li>
                        <li><strong>Technical Data:</strong> IP address, browser type and version, time zone setting, and location.</li>
                        <li><strong>Usage Data:</strong> Information about how you use our website and services.</li>
                        <li><strong>Marketing Data:</strong> Your preferences in receiving marketing from us.</li>
                    </ul>

                    <h2>3. How We Collect Your Data</h2>
                    <p>We collect data from you through:</p>
                    <ul>
                        <li><strong>Direct interactions:</strong> When you fill in forms on our website, contact us, or apply for a position.</li>
                        <li><strong>Automated technologies:</strong> As you interact with our website, we may automatically collect Technical Data.</li>
                        <li><strong>Third parties:</strong> We may receive data about you from analytics providers or search information providers.</li>
                    </ul>

                    <h2>4. How We Use Your Data</h2>
                    <p>We use your personal data for the following purposes:</p>
                    <ul>
                        <li>To manage your property inquiries and applications.</li>
                        <li>To process your job applications.</li>
                        <li>To send you information about our services and properties.</li>
                        <li>To improve our website, services, and customer experience.</li>
                        <li>To comply with legal obligations.</li>
                    </ul>

                    <h2>5. Data Sharing</h2>
                    <p>
                        We may share your personal data with third parties including service providers, regulatory authorities, 
                        and professional advisors. We require all third parties to respect the security of your personal data 
                        and to treat it in accordance with the law.
                    </p>

                    <h2>6. Data Security</h2>
                    <p>
                        We have implemented appropriate security measures to prevent your personal data from being accidentally lost, 
                        used, or accessed in an unauthorized way. We limit access to your personal data to those employees, agents, 
                        contractors, and other third parties who have a business need to know.
                    </p>

                    <h2>7. Your Legal Rights</h2>
                    <p>Under data protection laws, you have rights including:</p>
                    <ul>
                        <li><strong>Right to access:</strong> Request a copy of your personal data.</li>
                        <li><strong>Right to rectification:</strong> Request correction of inaccurate data.</li>
                        <li><strong>Right to erasure:</strong> Request deletion of your personal data.</li>
                        <li><strong>Right to restrict processing:</strong> Request restriction of processing.</li>
                        <li><strong>Right to data portability:</strong> Request transfer of your data to another service.</li>
                        <li><strong>Right to object:</strong> Object to processing of your data.</li>
                    </ul>

                    <h2>8. Cookies</h2>
                    <p>
                        We use cookies to distinguish you from other users of our website. This helps us to provide you with a good 
                        experience when you browse our website and allows us to improve our site. For detailed information on the 
                        cookies we use, please see our <a href="{{ route('cookie.policy') }}">Cookie Policy</a>.
                    </p>

                    <h2>9. Changes to This Privacy Policy</h2>
                    <p>
                        We reserve the right to update this privacy policy at any time. We will notify you of any changes by posting 
                        the new privacy policy on this page. You are advised to review this privacy policy periodically for any changes.
                    </p>

                    <h2>10. Contact Us</h2>
                    <p>
                        If you have any questions about this privacy policy, please contact us:
                    </p>
                    <ul>
                        <li><strong>Email:</strong> info@kentconsultantsltd.co.ke</li>
                        <li><strong>Phone:</strong> +254 786 955 170</li>
                        <li><strong>Address:</strong> Sclaters House, Parklands Road, Nairobi, Kenya</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection