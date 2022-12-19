<!-- Start fashion Area -->
<!-- EXPERIENCIAS -->
<section class="category-area section-gap" id="experiencias">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">{!! $siteConfiguration->title_news !!}</h1>
                    <p>{!! $siteConfiguration->subtitle_news !!}</p>
                </div>
            </div>
        </div>
        <div class="active-cat-carusel">
            @foreach ($posts as $post)
                <div class="item single-cat">
                    <img src="{!! url('imagenes/ultima-noticia/' . $post->important_image) !!}" alt="{!! $post->title !!}">
                    <p></p>
                    <h4 class="text-center"><a href="{!! route('single.new', [$post->category->slug, $post->slug]) !!}">{!! $post->title !!}</a></h4>
                    <p>
                        {!! str_limit($post->summary, 57, ' ...') !!}
                    </p>
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
<!-- End fashion Area -->
