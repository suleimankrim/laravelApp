<?php 
namespace App\Repository;

use App\Models\Posts;
use App\DebugMessage\Entred;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralJsonException;
use Symfony\Component\Console\Output\ConsoleOutput;

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
			throw_if(!$posts, GeneralJsonException::class, 'not created');
             $posts->users()->sync(data_get($attributes,'user_id'));
             return $posts;
         });
		return $posts;
	}
	/**
	 * @return mixed
	 */
	public function update(Posts $post,array $attributes) {

		return DB::transaction(function ()use($post,$attributes) {
			$updated =$post->update([
				'title' => data_get($attributes, 'title', $post->title),
				'body' => data_get($attributes, 'body', $post->body)
			]);
			
			throw_if(!$updated, GeneralJsonException::class, 'not updated');
			
			if ($user_id = data_get($attributes,'user_id')) {

				$post->users()->sync($user_id);
			}
			return $post;
		});
		
		

	}
	
	/**
	 * @return mixed
	 */
	public function destroy(Posts $post) {
		$delete= DB::transaction(function ()use($post) {
			$post->forceDelete();
		});
		throw_if(!$delete,GeneralJsonException::class,'the post not deleted');
	}
}