<header class="header">
    <div class="container">
        <div class="header-wrp">
            <section class="header-section header-section-nav">
                <ul class="header-nav-list">
                    <li class="header-nav-element">
                        <a href="{{ route('blog.user.home') }}" class="header-nav-link">
                            {{ __('Home') }}
                        </a>
                    </li>
                </ul>
            </section>
            <section class="header-section header-section-control">
                <ul class="header-control-list">
                    @auth
                        <li class="header-control-element">
                            <a href="{{ route('blog.user.account.edit') }}" class="header-contol-link link-button"
                                title="{{ __('Profile') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li class="header-control-element">
                            <a href="{{ route('blog.user.logout.execute') }}" class="header-contol-link link-button"
                                title="{{ __('Logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    @else
                        <li class="header-control-element">
                            <a href="{{ route('blog.user.authentication') }}" class="header-control-link link-button"
                                title="{{ __('Authenticate') }}">
                                {{ __('Authenticate') }}
                            </a>
                        </li>
                        <li class="header-control-element">
                            <a href="{{ route('blog.user.registration') }}" class="header-control-link link-button"
                                title="{{ __('Registrate') }}">
                                {{ __('Registrate') }}
                            </a>
                        </li>
                    @endauth
                </ul>
            </section>
        </div>
    </div>
</header>