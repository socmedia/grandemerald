<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_type', 'name', 'thumbnail', 'media_path', 'alt', 'references_url', 'position', 'is_active',
    ];

    protected static function newFactory()
    {
        return \Modules\Gallery\Database\factories\GalleryFactory::new ();
    }

    public static function getBanners()
    {
        return static::query()->where('is_active', 1)->orderBy('position')->get();
    }
}