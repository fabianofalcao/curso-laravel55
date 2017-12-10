<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function search($request, $totalPage = 10)
    {
        $keySearch = $request->key_search;
        return $this->where('name', 'LIKE', "%{$keySearch}%")
                    ->orWhere('initials', 'LIKE', "%{$keySearch}%")
                    ->paginate($totalPage);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
