<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{   
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'is_completed'];
    use HasFactory;

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
