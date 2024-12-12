<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'address', 'stone_type_id'];

    public function stoneType()
    {
        return $this->belongsTo(StoneType::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $searchTerm = '%' . request('search') . '%';

            $query->where('name', 'like', $searchTerm)
                ->orWhereHas('stoneType', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                });
        }
    }
}
