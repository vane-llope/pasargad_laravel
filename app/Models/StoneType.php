<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function scopeFilter($quary, array $filters)
    {
        if ($filters['search'] ?? false) {
            $quary->where('name', 'like', '%' . request('search') . '%');
        }
    }
    public function mine()
    {
        return $this->hasMany(Mine::class);
    }
    public function stone()
    {
        return $this->hasMany(Stone::class);
    }
}
