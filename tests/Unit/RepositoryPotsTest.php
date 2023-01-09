<?php

namespace Tests\Unit;

use App\Models\Posts;
use App\Repository\PostRepository;
use GuzzleHttp\Promise\Create;
use Tests\TestCase;


class RepositoryPotsTest extends TestCase
{
    public function test_create()
    {
        $repository=$this->app->make(PostRepository::class);
        $payload = [
           'title'=>'hhee',
           'body'=>[]
        ];
        $result = $repository->create($payload);
        $this->assertSame($payload['title'],$result->title,'create dosent match');
    }
    public function test_update()
    {
        $repository = $this->app->make(PostRepository::class);
        $dumyPost = Posts::factory(1)->create() -> first();
        $payload = [
           'title'=>'sss',
        ];
        $result = $repository->update($dumyPost, $payload);
        $this->assertSame($payload['title'],$result->title , 'post not updated');
    }
}
