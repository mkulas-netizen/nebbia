<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlovenskoRss extends Model
{
    use HasFactory;

    protected $table = 'slovenko';
    protected $fillable = ['title', 'link', 'description','pubDate'];
    public $timestamps = false;
}
