{{--Header Included--}}
@include('includes.frontend.header')


{{--Top Navbar Included--}}
@include('includes.frontend.top-navbar')
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url({{ $post->photo ? $post->photo->file : "" }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">{{ Str::upper($post->title) }}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="{{ route('categories') }}">Articles <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ $post->title }}</span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 order-lg-last ftco-animate">

               @yield('content')

            </div> <!-- .col-md-8 -->


            <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <ul class="categories">
                        <h3 class="heading mb-4">Categories</h3>
                        @if($categories)
                            @foreach($categories as $category)
                                <li><a href="{{ route('posts.by.categories', $category->slug) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading mb-4">Recent Blog</h3>
                @if($posts)
                    @foreach($posts as  $post)
                        <div class="block-21 mb-4 d-flex">
                            <a href="{{ route('home.post', $post->slug) }}" class="blog-img mr-4" style="background-image: url({{ $post->photo ? $post->photo->file : URL::asset('front-assets/images/user-male.png')  }})"></a>
                            <div class="text">
                                <h3><a href="{{ route('home.post', $post->slug) }}">{{ Str::limit($post->title) }}</a></h3>
                                <div class="meta">
                                    <div><span class="icon-calendar"></span>  {{ $post->created_at->format('l') }} {{ $post->created_at->day}}, {{ $post->created_at->year}}</div>
                                    <div><a href="#"><span class="icon-person"></span> {{ strtok($post->user->name, " ") }}</a></div>
                                    <div><span class="icon-chat"></span> {{ $post->comments->count() }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading mb-4">Tag Cloud</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">dish</a>
                        <a href="#" class="tag-cloud-link">menu</a>
                        <a href="#" class="tag-cloud-link">food</a>
                        <a href="#" class="tag-cloud-link">sweet</a>
                        <a href="#" class="tag-cloud-link">tasty</a>
                        <a href="#" class="tag-cloud-link">delicious</a>
                        <a href="#" class="tag-cloud-link">desserts</a>
                        <a href="#" class="tag-cloud-link">drinks</a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading mb-4">Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->

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



