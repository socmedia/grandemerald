<?php

namespace App\Traits;

use Modules\Blog\Entities\Blog;

trait ArticleContracts
{
    public function getBlogs($total = 5)
    {
        $article = Blog::where('published', 1)->orderBy('created_at', 'desc')->select([
            'title',
            'slug_title',
            'subject',
            'viewer',
            'created_at',
        ]);
        return $article->paginate($total);
    }

    public function getPopulars($total = 5)
    {
        $article = Blog::where(['published' => 1, ['viewer', '>', 10]])->orderBy('viewer', 'desc')->limit($total);
        return $article->get([
            'title',
            'slug_title',
            'subject',
            'viewer',
            'created_at',
        ]);
    }

    public function findRelatedBlog($tags)
    {
        $article = Blog::orderBy('viewer', 'desc')
            ->where('published', 1);
        foreach ($tags as $tag) {
            $article->orWhere('tags', 'LIKE', '%' . $tag . '%');
        }
        return $article->limit(5)->get([
            'title',
            'slug_title',
            'subject',
            'viewer',
            'created_at',
        ]);
    }
}