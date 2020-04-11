{{--Header Included--}}
@include('includes.frontend.header')

{{--Top Navbar Included--}}
@include('includes.frontend.top-navbar')
<!-- END nav -->


<section class="hero-wrap hero-wrap-2" style="background-image: url({{ $category->photo ? $category->photo->file : ""}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">{{ $category->name }}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('categories') }}">Categories <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2">{{ $category->name }} </span></p>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="row">

                    @if(count($postsByCategories))
                        @foreach($postsByCategories as $post)
                    <div class="col-md-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ route('home.post', $post->slug) }}" class="img d-flex align-items-end" style="background-image: url({{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/640x360' }});">
                                <div class="overlay"></div>
                            </a>
                            <div class="text pt-3">
                                <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
                                <h3><a href="{{ route('home.post', $post->slug) }}">{{ $post->title }}</a></h3>

                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2 class="mb-4">No Posts yet</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar-wrap">
                    <div class="sidebar-box pr-2 pl-2 pt-2 ftco-animate">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box pr-2 pl-2 text-center ftco-animate">
                        <h2 class="heading mb-4">Categories</h2>
                        <div class="text pt-1 pb-5">
                            @if($categories)
                                @foreach($categories as $category)
                                    <ul>
                                        <li class="cat-item cat-item-1553"><a href="{{ route('posts.by.categories', $category->slug) }}"><i class="ion ion-ios-folder-open"></i>{{ $category->name }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    </div>
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

