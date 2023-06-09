@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блокк</h1>
            <section class="featured-posts-section">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="m-auto">
                    {{ $posts->links() }}
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        @foreach ($random_posts as $random_post)
                            <div class="row blog-post-row">
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ 'storage/' . $random_post->preview_image }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $random_post->category->title }}</p>
                                    <a href="#!" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $random_post->title }}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">

                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Post List</h5>
                        <ul class="post-list">
                            @foreach ($liked_posts as $liked_post)
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ 'storage/' . $liked_post->preview_image }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $liked_post->title }}
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
