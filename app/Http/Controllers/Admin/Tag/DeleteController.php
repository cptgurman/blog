<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
