<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneType extends Model
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
    public function quarry()
    {
        return $this->hasMany(Quarry::class);
    }
    public function stone()
    {
        return $this->hasMany(Stone::class);
    }
}
