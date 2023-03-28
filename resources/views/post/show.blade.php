@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by Richard Searls •
                {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} •
                {{ $post->comments->count() }}
                Комметариев</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('/storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{ asset('/storage/' . $post->preview_image) }}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{ asset('/storage/' . $post->preview_image) }}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{ asset('/storage/' . $post->preview_image) }}" alt="blog post" class="img-fluid">
                    </div>
                </div>
            </section>
            <section>
                @auth
                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent overflow-hidden">
                            <i class="fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                        </button>
                    </form>
                @endauth
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach ($related_posts as $related_post)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('/storage/' . $related_post->preview_image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <p class="post-category">{{ $related_post->category->title }}</p>
                                    <a href="{{ route('post.show', $related_post->id) }}">
                                        <h5 class="post-title">{{ $related_post->title }}</h5>
                                    </a>

                                </div>
                            @endforeach

                        </div>
                    </section>

                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                        @foreach ($post->comments as $comment)
                            <div class="comment-text mx-1">
                                <div class="block mb-1"> {{ $comment->user->name }}</div>

                                <span class="text-muted float-right">{{ $comment->CarbonAsDate->diffForHumans() }}</span>
                                {{ $comment->message }}
                            </div>
                        @endforeach
                    </section>

                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Добавить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
