<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-3">
                <img class="footer-logo img-responsive" src="{{ asset('img/footer_logo.png') }}" alt="footer-logo">
            </div>
            <div class="col-sm-2">
                <div class="quick-links">
                    <div class="title">
                        Quick Links
                    </div>
                    <ul>
                        @include('layouts.partials.navigation', ['footer_navigation' => true])
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
