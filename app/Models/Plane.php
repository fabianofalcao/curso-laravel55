<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['name', 'brand_id', 'qty_passengers', 'class'];

    public function classes($className = null)
    {
        $classes = [
            '' => 'Selecione uma classe',
            'economic' => 'Econômica',
            'luxury' => 'Luxo'
        ];

        if(!$className)
            return $classes;
        else
            return $classes[$className];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function search($request, $totalPage = 10)
    {
        $keySearch = $request->key_search;
        return $this->where('name', 'LIKE', "%{$keySearch}%")
                    ->orWhere('qty_passengers', $keySearch)
                    ->orWhere('class', $keySearch)
                    ->paginate($totalPage);
    }
}
