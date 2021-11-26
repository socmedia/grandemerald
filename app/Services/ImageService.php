<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function convert($resource, $data = [])
    {
        $h = 600;
        $w = 600;

        $image = Image::make($resource);

        if ($data['h'] && $data['w']) {
            $image->resize($data['w'], $data['h']);
        } elseif ($data['w'] && !$data['h']) {
            $image->resize($data['w'], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($data['h'] && !$data['w']) {
            $image->resize(null, $data['h'], function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif (array_key_exists('h', $data) && array_key_exists('w', $data)) {
            $image->height() > $image->width() ? $w = null : $h = null;
            $image->resize($w, $h, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        return $image->response('jpg');
    }

    public function findMedia($disk, $shortPath)
    {
        $path = storage_path('app/public/' . $disk . '/' . $shortPath);

        if (!File::exists($path)) {
            return false;
        }

        return File::get($path);
    }
}