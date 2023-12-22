<?php

namespace  Edguy\AdminPanel\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use  Edguy\AdminPanel\Models\Image;

class ImageService
{
    public function addImage($item, $model, UploadedFile $file, string $path)
    {
        !$item->image ?: self::deleteImage($item->image->id, $item->image);

        $thumbPath = "uploads/images/$path/thumb";

        $imageFile = $file;

        $image = new Image();

        $image->path = $imageFile->store($path, 'public');

        $interventionImage = InterventionImage::make($file)
            ->fit(300, 170, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode();

        Storage::disk('public')->put($thumbPath . '/' . $imageFile->hashName(), $interventionImage->__toString());

        $image->imageable_id = $item->id;

        $image->imageable_type = $model;

        $image->thumb_path = $thumbPath . '/' . $imageFile->hashName();

        $image->save();
    }

    public static function deleteImage($id, $image = null)
    {/* @var Image $image*/

        $image = $image ?? Image::query()->find($id);

        if ($image)
        {
            Storage::delete('public/'.$image->path);

            Storage::delete('public/'.$image->thumb_path);

            $image->delete();

            return response('success delete', 200);
        }

        return  response('image not found', 404);

    }
}
