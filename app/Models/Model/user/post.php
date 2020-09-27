<?php


namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags()
    {

        return $this->belongsToMany('App\Models\user\tag', 'post_tags')->withTimestamps();
    }
    public function categories()
    {

        return $this->belongsToMany('App\Models\user\category', 'category_posts');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
