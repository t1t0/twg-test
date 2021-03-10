<!-- Page Heading -->
<header class="p-3 mb-3 shadow-sm sticky-top d-flex flex-column flex-md-row align-items-center px-md-4 bg-body border-bottom">
    <p class="my-0 h5 me-md-auto fw-normal"><a href="{{ route('dashboard') }}"><img src="https://twgroup.cl/app/uploads/2020/08/LOGO_PRINCIPAL.png" width="100"></a></p>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log out') }}
        </x-responsive-nav-link>
    </form>
</header>