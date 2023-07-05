<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'owner', 'year', 'tax', 'fee', 'notes', 'cost', 'user_id'
    ];

    public function taskCategories()
    {
        return $this->hasMany(TaskCategory::class);
    }
}
