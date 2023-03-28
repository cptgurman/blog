<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(3);
        $random_posts = Post::get()->random(2);
        $liked_posts = Post::withCount('LikedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        return view('post.index', compact('posts', 'random_posts', 'liked_posts'));
    }
}
