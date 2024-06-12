<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Including meta tags and other meta information -->
        @include('includes.landing.meta')

        <!-- Setting the page title -->
        <title>@yield('title') | SERV</title>

        <!-- Placeholder for styles that should be loaded before the main styles -->
        @stack('before-style')

        <!-- Including main styles -->
        @include('includes.landing.style')

        <!-- Placeholder for styles that should be loaded after the main styles -->
        @stack('after-style')
    </head>
    <body class="antialiased">
        <div class="relative">
            <!-- Including the header -->
            @include('includes.landing.header')

            <!-- Including SweetAlert notifications -->
            @include('sweetalert::alert')

            <!-- Yielding the content section to be filled by the specific page -->
            @yield('content')

            <!-- Including the footer -->
            @include('includes.landing.footer')

            <!-- Placeholder for scripts that should be loaded before the main scripts -->
            @stack('before-script')

            <!-- Including main scripts -->
            @include('includes.landing.script')

            <!-- Placeholder for scripts that should be loaded after the main scripts -->
            @stack('after-js')

            <!-- Including modals for login, register, and register success -->
            @include('component.modal.login')
            @include('component.modal.register')
            @include('component.modal.register-success')
        </div>
    </body>
</html>
