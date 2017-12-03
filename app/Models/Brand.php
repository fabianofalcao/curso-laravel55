<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($request, $totalPage = 10)
    {
        $keySearch = $request->key_search;
        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate($totalPage);
    }

    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
}
