<?php

namespace  Edguy\AdminPanel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @Image
 *
 * @property integer id
 * @property string path
 * @property string imageable_type
 * @property integer imageable_id
 * @property boolean is_main
 * @property string thumb_path
 */

class Image extends Model
{
    use HasFactory;

    public function imageable(): MorphTo
    {
        return $this->morphTo('imageable');
    }
}
