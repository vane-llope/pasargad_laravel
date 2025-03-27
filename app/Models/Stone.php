<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'bestselling',
        'name_fa',
        'name_en',
        'image',
        'tensile_strength_fa',
        'tensile_strength_en',
        'water_absorption_rate_fa',
        'water_absorption_rate_en',
        'compressive_strength_fa',
        'compressive_strength_en',
        'abrasion_resistance_fa',
        'abrasion_resistance_en',
        'specific_weight_fa',
        'specific_weight_en',
        'failure_mode_fa',
        'failure_mode_en',
        'porosity_fa',
        'porosity_en',

        'stone_type_id'
    ];
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
                ->orWhere('code', 'like', $searchTerm)
                ->orWhereHas('stoneType', function ($query) use ($searchTerm) {
                    $query->where('name_fa', 'like', $searchTerm)
                        ->orWhere('name_en', 'like', $searchTerm);
                });
        }
    }

}
