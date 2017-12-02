<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['name', 'qty_passengers', 'class'];

    public function classes()
    {
        return [
            '' => 'Selecione uma classe',
            'economic' => 'Econômica',
            'luxury' => 'Luxo'
        ];
    }

    public function search($request, $totalPage = 10)
    {
        $keySearch = $request->key_search;
        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate($totalPage);
    }
}
