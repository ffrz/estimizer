<?php

namespace App\Models\AhspMgr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'uom', 'group_id', 'category_id'
    ];

    protected $table = 'lib_ahsp_tasks';
    protected $with = ['group', 'category'];

    public function details()
    {
        return $this->hasMany(TaskDetail::class);
    }

    public function group()
    {
        return $this->belongsTo(TaskGroup::class);
    }

    public function category()
    {
        return $this->belongsTo(TaskCategory::class);
    }
}
