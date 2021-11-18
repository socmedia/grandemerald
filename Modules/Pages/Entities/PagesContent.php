<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagesContent extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'route_name',
        'section',
        'image',
        'title',
        'description',
        'is_active',
        'order',
    ];

    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\PagesContentFactory::new ();
    }
}