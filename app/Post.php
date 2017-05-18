<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'slug', 'body', 'user_id', 'category_id', 'images',

    ];


    public function user() 
    {
        return $this->belongsTo('App\User');
    }

     public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()

    {
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function scopeFilter($query, $filters)
    {
         if ($month = $filters['month']) {
          $query->whereMonth('created_at', Carbon::parse($month)->month);
        }


        if ($year = $filters['year']) {
          $query->whereYear('created_at', $year);
         }



    }


    public static function archives()
    {
       return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

        ->groupBy('year', 'month')

        ->orderByRaw('min(created_at) desc')

        ->get()

        ->toArray();
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('title', 'like', '%' .$s. '%');
    }
}
