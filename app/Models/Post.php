<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title','content','user_id','created_at','updated_at'];

    /** @todo toto odkomentujte
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id = Auth::user()->id;
            $model->created_at = Carbon::now();
            return $model;
        });
    }
     */


    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->content)
            ->updated($this->updated_at)
            ->link($this->link)
            ->author($this->user->name);
    }

    public function getLinkAttribute()
    {
        return route('posts.show', $this);
    }

    public static function getFeedItems()
    {
        return static::all();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
