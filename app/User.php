<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function newUser($request, $nameFile = '')
    {
        $this->name = $request->name;
        $this->password = ($request->password ? bcrypt($request->password) : bcrypt('opgsv5@t,'));
        $this->email = $request->email;
        $this->is_admin = ($request->is_admin ? true : false);
        $this->image = $nameFile;
        return $this->save();
        
        /*
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['image'] = $nameFile;
        return $this->create($data);
        */
    }

    public function updateUser($request, $nameFile, $id)
    {
        /*
        dd($request->all());
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if($request->password && $request->password != '')
            $data['password'] = bcrypt($request->password);
        $data['is_admin'] = $request->is_admin ? true : false;
        $data['image'] = $nameFile; 
  
        return $this->where('id', $id)->update($data);
        */

        $this->name     = $request->name;
        $this->email    = $request->email;

        // Verifica se atualizou a senha, caso contrário não atualiza como null
        if($request->password && $request->password != '')
            $this->password = bcrypt($request->password);

        $this->is_admin = $request->is_admin ? true : false;
        
        $this->image = $nameFile;

        return $this->save();

    }

    public function search($request, $totalPage = 10)
    {
        $keySearch = $request->key_search;
        return $this->where('name', 'LIKE', "%{$keySearch}%")->orWhere('email', 'LIKE', "%{$keySearch}%")->paginate($totalPage);
    }
}
