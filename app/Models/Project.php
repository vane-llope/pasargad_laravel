<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'images', 'summary', 'description', 'tags', 'project_type_id'];
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $searchTerm = '%' . request('search') . '%';

            $query->where('tags', 'like', $searchTerm)
                ->orWhere('title', 'like', $searchTerm)
                ->orWhereHas('projectType', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                });
        }
    }

}
