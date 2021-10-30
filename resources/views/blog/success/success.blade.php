<main class="main">
    <div class="container">
        <div class="success-main-wrp">
            <div class="success">
                <section class="success-section">
                    <span class="success-message">
                        {{ Session::get('message') }}
                    </span>
                </section>
                <section class="success-section">
                    <a href="{{ route('blog.user.home') }}" class="header-nav-link">
                        {{ __('Home') }}
                    </a>
                </section>
            </div>
        </div>
    </div>
</main>