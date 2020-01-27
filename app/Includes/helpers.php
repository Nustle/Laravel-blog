<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

if (!function_exists('getHourByDate')) {
    function getHourByDate(string $date)
    {
        $current = Carbon::now();

        $res = $current->diffInHours($date, false);

        return $res;
    }
}


if (!function_exists('getResizeFile')) {
    function getResizeFile($request)
    {
        $imagePath = storage_path('app/public/images/' . $request->file('image'));
        $image = Image::make($imagePath);

        $image->resize(1280, 720, function ($constraint) {
            $constraint->aspectRatio();
        });

        return $image->save($imagePath);
    }
}

if (!function_exists('insertImage')) {
    function insertImage($request)
    {
        if (empty($request->file('image'))) {
            $image = null;
        } else {
            $image = $request->file('image')->store('images', 'public');
        }

        return $image;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage(string $imageName = null)
    {
        if (empty($imageName)) {
            $image = null;
        } else {
            $image = Storage::delete('public/' . $imageName);
        }

        return $image;
    }
}

if (!function_exists('insertResizeFile')) {
    function insertResizeFile($request)
    {
        $imagePath = storage_path('app/public/images/' . $request->file('image'));

        return Image::make($imagePath)
            ->resize(1280, 720)
            ->insert('header.jpg');
    }
}

if (!function_exists('insertResizeFileOld')) {
    function insertResizeFileOld($request)
    {
        $file = $request->file('image');

        $filenameWithExtension = $file->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . uniqid() . '.' . $extension;

        Storage::put('public/images/' . $filenameToStore, fopen($file, 'r+'));

        $thumbNailPath = public_path('storage/images/' . $filenameToStore);
        $img = Image::make($thumbNailPath);
        $height = $img->height();
        $width = $img->width();

        if (($height >= 401 || $height <= 401) && ($width >= 1201 || $width <= 1201)) {
            $img->resize(400, 1200, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $img->save($thumbNailPath);

        return 'images/' . $filenameToStore;
    }
}
