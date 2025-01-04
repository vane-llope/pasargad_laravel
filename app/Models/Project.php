<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title_fa', 'title_en', 'images', 'summary_fa', 'summary_en', 'description_fa', 'description_en', 'tags', 'project_type_id'];
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
                ->orWhere('title_fa', 'like', $searchTerm)
                ->orWhere('title_en', 'like', $searchTerm)
                ->orWhereHas('projectType', function ($query) use ($searchTerm) {
                    $query->where('name_fa', 'like', $searchTerm)
                        ->orWhere('name_en', 'like', $searchTerm);
                });
        }
    }

}
