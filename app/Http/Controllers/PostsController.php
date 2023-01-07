<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Repository\PostRepository;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $posts = Posts::query()->paginate($request->page_size??3);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     */
    public function store(Request $request,PostRepository $postRepository)
    {
        $posts=$postRepository->create($request->only([
            'title','body','user_id'
        ]));
        return new PostResource($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return 
     */
    public function show(Posts $post)
    {
        return new PostResource($post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostsRequest  $request
     * @param  \App\Models\Posts  $posts
     * @return 
     */
    public function update(UpdatePostsRequest $request, Posts $post,PostRepository $postRepository)
    {
        $updated = $postRepository->update($post, $request->only([
            'title','body'
        ]));
        if (!$updated) {
            return new JsonResponse([
                'error'=>'not updated'
            ],400);
        } else {
            return new PostResource($updated);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return 
     */
    public function destroy(Posts $post,PostRepository $postRepository)
    {
        $destroyed = $postRepository->destroy($post);
        if (!$destroyed) {
            return new JsonResponse([
              'error'=>'not deleted'
            ]);
        } else {
            return new JsonResponse([
                'seccess'=>'deleted'
              ]);
        }
    }
}
