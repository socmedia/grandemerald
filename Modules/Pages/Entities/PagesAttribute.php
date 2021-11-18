<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagesAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pages_id',
        'attribute',
        'value',
    ];

    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\PagesAttributeFactory::new ();
    }

    public function pages()
    {
        return $this->belongsTo(Page::class, 'pages_id', 'id');
    }
}