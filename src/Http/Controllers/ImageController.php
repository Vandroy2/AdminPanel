<?php

namespace  Edguy\AdminPanel\Http\Controllers;

use App\Http\Controllers\Controller;
use Edguy\AdminPanel\Services\ImageService;

class ImageController extends Controller
{
    public function destroy($id)
    {
        return ImageService::deleteImage($id);
    }
}
