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
        'pages_id',
        'title_normal',
        'title_secondary',
        'image',
        'description',
        'is_active',
        'order',
    ];

    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\PagesContentFactory::new ();
    }

    public function attributes()
    {
        return $this->hasMany(ContentAttribute::class, 'content_id', 'id');
    }
}