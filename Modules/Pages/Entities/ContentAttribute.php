<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'type',
        'attribute',
        'value',
    ];

    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\ContentAttributeFactory::new ();
    }
}