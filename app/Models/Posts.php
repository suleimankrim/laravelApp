<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','body'
    ];
    protected $casts = [
        'body' => 'array',
    ];
   /**
    * Get all of the comments for the Posts
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function comments(): HasMany
   {
       return $this->hasMany(Comment::class, 'post_id', 'id');
   }
   /**
    * The users that belong to the Posts
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function users(): BelongsToMany
   {
       return $this->belongsToMany(User::class, 'posts_users', 'post_id', 'user_id');
   }
    public function getTitleUpperCaseAttribute()
    {
        return $this->title.' SULEIMAN';
    }
    public function setTitleAtrribute($value)
    {
        $this->attributes['title']=strtoupper($value);
    }
}
