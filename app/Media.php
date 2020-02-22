<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $timestamps = false;

    public $table = 'media';

    public $primaryKey = 'media_id';

    public $fillable = [
        'id',
        'type',
        'slug',
        'url',
        'bitly_url',
        'embed_url',
        'username',
        'source',
        'content_url',
        'source_post_url',
        'update_datetime',
        'create_datetime',
        'import_datetime',
        'trending_datetime',
        'title'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'media_id', 'media_id');
    }
}
