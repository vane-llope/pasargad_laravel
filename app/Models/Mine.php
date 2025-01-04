<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    use HasFactory;
    protected $fillable = ['name_fa', 'name_en', 'images', 'address_fa', 'address_en', 'stone_type_id'];

    public function stoneType()
    {
        return $this->belongsTo(StoneType::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $searchTerm = '%' . request('search') . '%';

            $query->where('name_fa', 'like', $searchTerm)
                ->orWhere('name_en', 'like', $searchTerm)
                ->orWhereHas('stoneType', function ($query) use ($searchTerm) {
                    $query->where('name_fa', 'like', $searchTerm)
                        ->orWhere('name_en', 'like', $searchTerm);
                });
        }
    }
}
