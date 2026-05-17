<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    # fungsi: daftar kolom yang boleh diisi dari form admin.
    protected $fillable = [
        'title',
        'description',
        'background',
    ];
}
