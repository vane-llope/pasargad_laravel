<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable = ['name_fa', 'name_en'];

    public function scopeFilter($quary, array $filters)
    {
        if ($filters['search'] ?? false) {
            $quary->where('name_fa', 'like', '%' . request('search') . '%')
                ->orWhere('name_en', 'like', '%' . request('search') . '%');
        }
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
