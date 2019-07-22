<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo-8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jul 2019 13:19:09 GMT -->
<head>
    @include('layouts.frontend._head')
</head>
<body>
<div class="page-wrapper">
    <header class="header">
        @include('layouts.frontend._header')
    </header><!-- End .header -->

    <main class="main">
        @yield('content')
    </main><!-- End .main -->

    <footer class="footer">
        @include('layouts.frontend._footer')
    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    @include('layouts.frontend._mobileMenu')
</div><!-- End .mobile-menu-container -->

<div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url({{ asset('assets/frontend/images/newsletter_popup_bg.jpg') }})">
    <div class="newsletter-popup-content">
        <img src="{{ asset('assets/frontend/images/logo-black.png') }}" alt="Logo" class="logo-newsletter">
        <h2>BE THE FIRST TO KNOW</h2>
        <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
        <form action="#">
            <div class="input-group">
                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                <input type="submit" class="btn" value="Go!">
            </div><!-- End .from-group -->
        </form>
        <div class="newsletter-subscribe">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div><!-- End .newsletter-popup-content -->
</div><!-- End .newsletter-popup -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

@include('layouts.frontend._scripts')
</body>

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo-8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jul 2019 13:19:44 GMT -->
</html>