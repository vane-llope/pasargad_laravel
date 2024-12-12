<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'image',
        'Tensile_Strength',
        'Water_Absorption_Rate',
        'Compressive_Strength',
        'Abrasion_Resistance',
        'Specific_Weight',
        'Failure_Mode',
        'Porosity',
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

            $query->where('name', 'like', $searchTerm)
                ->orWhere('code', 'like', $searchTerm)
                ->orWhereHas('stoneType', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                });
        }
    }

}
