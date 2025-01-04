<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name_fa',
        'name_en',
        'image',
        'Tensile_Strength_fa',
        'Tensile_Strength_en',
        'Water_Absorption_Rate_fa',
        'Water_Absorption_Rate_en',
        'Compressive_Strength_fa',
        'Compressive_Strength_en',
        'Abrasion_Resistance_fa',
        'Abrasion_Resistance_en',
        'Specific_Weight_fa',
        'Specific_Weight_en',
        'Failure_Mode_fa',
        'Failure_Mode_en',
        'Porosity_fa',
        'Porosity_en',
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
