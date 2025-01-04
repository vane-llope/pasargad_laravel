<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['images', 'title_fa', 'title_en', 'summary_fa', 'summary_en', 'description_fa', 'description_en', 'tags'];
    public function scopeFilter($quary, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $quary->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $quary->where('tags', 'like', '%' . request('search') . '%')
                ->orWhere('title_fa', 'like', '%' . request('search') . '%')
                ->orWhere('title_en', 'like', '%' . request('search') . '%');
        }
    }
}
