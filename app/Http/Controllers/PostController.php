<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Requests\PostStore;

class PostController extends Controller
{
    /**
     * GET /
     *
     * @return string
     */
    public function index()
    {
        //dump(request()->user()->getMergedPermissions());
    }

    /**
     * GET /create
     *
     * @return string
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * POST /create
     *
     * @param  Request $request
     * @return void
     */
    public function store(PostStore $request)
    {
        $post = App\Post::create($request->all());

        // Stamp a user to blog.
        $authUser = $request->user();
        $post->user()->associate($authUser)->save();

        return redirect()->route('post')
                    ->with('success', 'Post has been created');
    }

    /**
     * GET /{id}/edit
     *
     * @param  model  $id
     * @return string
     */
    public function edit($post)
    {
        // $post = App\Post::find($id);

        // if (! request()->user()->can('update', $post)) {
        //     abort(401, 'This action is unauthorized');
        // }

        // .....
    }

    /**
     * PUT /{id}
     *
     * @param  Request $request
     * @param  integer $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $post = App\Post::find($id);

        if (! request()->user()->can('update', $post)) {
            abort(403, 'This action is unauthorized');
        }

        // .....
    }

    /**
     * DELETE /{id}
     *
     * @param  Request $request
     * @param  integer  $id
     * @returnvoid
     */
    public function destroy(Request $request, $id)
    {
        $post = App\Post::find($id);

        if (! request()->user()->can('update', $post)) {
            abort(403, 'This action is unauthorized');
        }

        // .....
    }
}
