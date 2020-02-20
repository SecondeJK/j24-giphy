<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    public $table = 'image';

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'media_id');
    }
}
