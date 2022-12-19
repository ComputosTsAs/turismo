{{-- Start travel Area --}}
<section class="category-area section-gap" id="servicios">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">{!! $siteConfiguration->title_events !!}</h1>
                    <p>{!! $siteConfiguration->subtitle_events !!}</p>
                </div>
            </div>
        </div>
        <div class="active-cat-carusel">
            @foreach ($events as $event)
                <div class="item single-cat">
                    <img src="{!! url('imagenes/ultima-noticia/' . $event->important_image) !!}" alt="{!! $event->title !!}">
                    <p></p>
                 <h4 class="text-center"><a href="{!! route('single.event', $event->slug) !!}">{!! $event->title !!}</a></h4>
                <p></p>
                 <p>{!! $event->summary !!}</p>
                </div>
            @endforeach
        </div>
        @if ($posts->count() >= 3)
            <div class="col text-center">
                <a href="{!! route('news') !!}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Ver más experiencias</a>
            </div>
                @endif



    </div>
</section>
{{-- End travel Area --}}
