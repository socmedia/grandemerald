<?php

namespace App\Services;

use Modules\Gallery\Entities\Gallery;

class GalleryService
{
    /**
     * Get all gallery from sotrage
     *
     * @param  array $data
     * @param  string $route
     * @return void
     */
    public function getAll(array $data)
    {
        $gallery = Gallery::select('*');

        $this->filters($gallery, $data);

        return $gallery->orderBy($data['order'], $data['sort'])->simplePaginate($data['perPage']);
    }

    /**
     * Perform filtering before data collection is done
     *
     * @param  object $gallery
     * @param  array $data
     * @return void
     */
    public function filters(object $gallery, array $data): void
    {
        // Search query
        if ($data['search'] !== null) {
            $gallery->where(function ($gallery) use ($data) {
                $gallery->where('name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('alt', 'like', '%' . $data['search'] . '%')
                    ->orWhere('media_path', 'like', '%' . $data['search'] . '%')
                    ->orWhere('thumbnail', 'like', '%' . $data['search'] . '%')
                    ->orWhere('created_at', 'like', '%' . $data['search'] . '%');
            });
        }
    }

    /**
     * Logic used to update acive state data
     *
     * @param  object $gallery
     * @return void
     */
    public static function updateActiveState($gallery)
    {
        $gallery->is_active = $gallery->is_active ? 0 : 1;
        return $gallery->save();
    }
}