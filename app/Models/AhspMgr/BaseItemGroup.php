<?php

namespace App\Models\AhspMgr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItemGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'lib_base_item_groups';
}
