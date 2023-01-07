<?php
namespace App\Repository;

use App\Models\Posts;

abstract class BaseRepository
{
    abstract public function create(array $attributes);
    abstract public function update(Posts $post,array $attributes);
    abstract public function destroy(Posts $post);
}