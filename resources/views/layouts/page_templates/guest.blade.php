@include('layouts.navbars.navs.guest')

<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" data-image="{{ asset('paper') . '/' . ($backgroundImagePath ?? "img/bg/buniversitas-buddhi-dharma.jpg") }}">
        @yield('content')
        @include('layouts.footer')
    </div>
</div>
