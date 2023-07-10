<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItem extends Model
{
    use HasFactory;

    protected $table = 'lib_base_items';

    protected $fillable = [
        'name', 'uom', 'specification', 'brand', 'category_id',
    ];
}
