<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends BaseController
{
    public function index()
    {
        return view('assests.index');
    }

    public function post(Request $request)
    {
        $id = $request->input('id');

        return view('assests.post', [
            'id' => $id
        ]);
    }

    public function add()
    {
        return view('assests.add');
    }

    public function edit()
    {
        return view('assests.edit');
    }

    public function delete()
    {
        return view('assests.delete');
    }
}
