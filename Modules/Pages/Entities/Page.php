<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'is_active',
    ];

    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\PageFactory::new ();
    }

    public function contents()
    {
        return $this->hasMany(PagesContent::class, 'pages_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(PagesAttribute::class, 'pages_id', 'id');
    }
}