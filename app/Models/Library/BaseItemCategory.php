<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItemCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'lib_base_item_categories';
}
