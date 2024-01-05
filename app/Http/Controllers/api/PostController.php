<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserDetailResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        // return response()->json(['data' => $posts]);
        return UserDetailResource::collection($posts->loadMissing(['writer:id,username', 'comments'])); //perbadaan jika menggunakan ini, hasilnya bisa kita custom

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'news_content' => 'required'
        ]);


        $request['author'] = 1;
        // $request['author'] = Auth::user()->id;

        $post = Post::create($request->all());
        return response()->json(['status' => true, 'message' => 'Sukses menambah data'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('writer:id,email,username')->findOrFail($id);
        return new UserDetailResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'news_content' => 'required'
        ]);

        $post_data = Post::findOrFail($id);
        $post_data->update($request->all());
        
        return response()->json(['message' => 'Data berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post_data = Post::findOrFail($id);
        $post_data->delete();

        return new UserDetailResource($post_data->loadMissing('writer:id,username'));
    }
}
