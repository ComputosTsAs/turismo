<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{!! url('/') !!}">
            <img src="{!! url('imagenes/logo-main/' . $siteConfiguration->logo_main) !!}" alt="Turismo Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @if (Request::is('/'))
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#playas">Playas</a></li>
                    <li><a href="#experiencias">Experiencias</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#instagram">Instagram</a></li>
                @else
                    <li><a href="{!! url('/') !!}">Inicio</a></li>
                    <li><a href="{!! route('news') !!}">Experiencias</a></li>
                    <li><a href="{!! route('events') !!}">Servicios</a></li>
                @endif
                @auth
                    <li><a href="{!! route('dashboard') !!}">Panel</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
