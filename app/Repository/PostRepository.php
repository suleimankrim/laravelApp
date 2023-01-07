<?php 
namespace App\Repository;
use App\Models\Posts;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository{
    
	/**
	 * @return mixed
	 */
	public function create(array $attributes) {
        $posts = DB::transaction(function () use($attributes) {
            $posts=Posts::query()->create([
                 'title'=>data_get($attributes,'title') ,
                 'body'=>data_get($attributes,'body') 
             ]);
             $posts->users()->sync(data_get($attributes,'user_id'));
             return $posts;
         });
		return $posts;
	}
	/**
	 * @return mixed
	 */
	public function update(Posts $post,array $attributes) {
		$updated = $post->update([
            'title'=>data_get($attributes,'title',$post->title),
            'body'=>data_get($attributes,'body',$post->body)
        ]);
		return $updated;

	}
	
	/**
	 * @return mixed
	 */
	public function destroy(Posts $post) {
		return $post->forceDelete();
	}
}