{{--Header Included--}}
@include('includes.frontend.header')

{{--Top Navbar Included--}}
@include('includes.frontend.top-navbar')
<!-- END nav -->


<section class="hero-wrap hero-wrap-2" style="background-image: url({{ URL::asset('front-assets/images/bg_4.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Categories</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Categories<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4"><span>Categories</span></h2>
            </div>
        </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if($categories)
                            @foreach($categories as $category)
                        <div class="col-md-3 ftco-animate">
                            <div class="blog-entry">
                                <a href="{{ route('posts.by.categories', $category->slug) }}" class="img d-flex align-items-end" style="background-image: url({{ $category->photo ? $category->photo->file : 'http://via.placeholder.com/640x360' }});">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text pt-3">
                                    <h3 class="text-center"><a href="{{ route('posts.by.categories', $category->slug) }}">{{ $category->name }}</a></h3>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

    </div>


</section>



<section class="ftco-subscribe ftco-section bg-light">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-8">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@extends('includes.frontend.footer')

