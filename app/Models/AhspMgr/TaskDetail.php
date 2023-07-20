<?php

namespace App\Models\AhspMgr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;

    protected $table = 'lib_ahsp_task_details';

    protected $fillable = [
        'task_id', 'item_id', 'coefficient'
    ];

    public function parent()
    {
        return $this->belongsTo(Task::class);
    }

    public function item()
    {
        return $this->belongsTo(BaseItem::class);
    }
}
