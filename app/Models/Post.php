<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    //Relacion muchos a muchos

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getExcerpt(Int $longer){
        return Str::limit(strip_tags($this->extract), $longer);
    }

    public function getReadingTime(){
        $mins = round(str_word_count($this->body) / 250);

        return ($mins < 1) ? 1 : $mins;
    }

    public function  scopeWithCategory($query, Int $category_id){
       $query->where('category_id', $category_id);
    }

    public function  scopeWithTag($query, Int $tag_id){
        $query->whereHas('tags', fn ($q) => $q->where('tag_id', $tag_id));
    }

    public function  scopeBlogger($query, Int $blogger_id){
        $query->where('user_id', $blogger_id);
    }

    public function  scopeSearch($query, $search = ''){
        $query->where('name','LIKE', "%{$search}%");
    }

    public function  scopePopular($query){
         //like count
        //order by like count
        $query->withCount('likes')
        ->orderBy("likes_count", 'desc');
        //likes_count
    }
}
