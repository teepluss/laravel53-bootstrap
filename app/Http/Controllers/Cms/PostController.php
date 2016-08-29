<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * GET /
     *
     * @return string
     */
    public function index()
    {
        //return view('cms.post');
    }

    /**
     * GET /create
     *
     * @return string
     */
    public function create()
    {
        //
    }

    /**
     * POST /create
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * GET /{id}/edit
     *
     * @param  integer $id
     * @return string
     */
    public function edit($id)
    {
        //
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
        //
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
        //
    }

    /**
     * PATCH /{id}
     *
     * @param  Request $request
     * @param  integer $id
     * @return void
     */
    public function approve(Request $request, $id)
    {
        //
    }
}
