<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'url',
        'filename',
        'logo_filename',
        'size',
        'margin',
        'foreground',
        'background',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
