{{--Header Included--}}
@include('includes.frontend.header')


{{--Top Navbar Included--}}
@include('includes.frontend.top-navbar')
<!-- END nav -->

@if($posts)

<section class="home-slider owl-carousel">
    @foreach($posts as $post)
        <div class="slider-item">
            <div class="container">
                <div class="row d-flex slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="img" style="background-image: url({{ $post->photo ? $post->photo->file : "" }})"></div>

                    <div class="text d-flex align-items-center ftco-animate">
                        <div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
                            <h3 class="subheading mb-3">Latest Posts</h3>
                            <h1 class="mb-5">{{ $post->title }}</h1>
{{--                            <p class="mb-md-5">{{ strip_tags(Str::limit($post->body, 100)) }}</p>--}}
                            <p><a href="{{ route('home.post', $post->slug) }}" class="btn btn-black px-3 px-md-4 py-3">Read More <span class="icon-arrow_forward ml-lg-4"></span></a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4"><span>Latest Articles</span></h2>
                    </div>
                </div>
                <div class="row">

                    @foreach($posts as $post)
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="{{ route('home.post', $post->slug) }}" class="img d-flex align-items-end" style="background-image: url({{ $post->photo ? $post->photo->file : 'http://via.placeholder.com/640x360' }})">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text pt-3">
                                    <?php
                                    $post_date = $post->created_at;
                                    $unixTimestamp = strtotime($post_date);
                                    $dayOfWeek = date("l", $unixTimestamp);
                                    ?>
                                    <p class="meta d-flex"><span class="pr-3">{{ $post->category ? $post->category->name : "Uncategorized" }}</span><span class="ml-auto pl-3">{{ Str::substr($dayOfWeek, 0, 3) }} {{ $post->created_at->day }}, {{ $post->created_at->year }}</span></p>
                                    <h3><a href="{{ route('home.post', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p class="mb-0"><a href="{{ route('home.post', $post->slug) }}" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img d-flex align-self-stretch" style="background-image:url({{ URL::asset('front-assets/images/about.jpg') }});"></div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">About ArticlesDiary</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="10">0</strong>
                                <span>Years of Experienced</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="200">0</strong>
                                <span>Foods</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="300">0</strong>
                                <span>Lifestyle</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="40">0</strong>
                                <span>Happy Customers</span>
                            </div>
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



{{--Footer Start & Included--}}
@include('includes.frontend.footer')
