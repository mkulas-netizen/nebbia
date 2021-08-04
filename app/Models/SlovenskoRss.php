<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, false|\SimpleXMLElement|null $link)
 * @method static orderBy(string $string, string $string1)
 */
class SlovenskoRss extends Model
{
    use HasFactory;

    protected $table = 'slovenko';
    protected $fillable = ['title', 'link', 'description','read','pubDate'];
    public $timestamps = false;

}
