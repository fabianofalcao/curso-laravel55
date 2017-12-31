<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    protected $fillable = ['user_id', 'flight_id', 'date_reserved', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function status($op = null)
    {
        $statusAvailable = [
            '' => 'Selecione o status',
            'conceled' => 'Cancelado',
            'concluded' => 'Concluído',
            'paid' => 'Pago',
            'reserved' => 'Reservado'            
        ];
        
        if($op)
            return $statusAvailable[$op];
        else
            return $statusAvailable;
    }

    public function changeStatus($newStatus, $id)
    {
        //$this->status = $newStatus;
        //return $this->save();
        
        return $this->where('id', $id)->update(['status' => $newStatus]);
        
    }

    public function search($request, $totalPage)
    {
        $reserves = $this->join('users', 'users.id', '=', 'reserves.user_id')
                         ->join('flights', 'flights.id', '=', 'reserves.flight_id')
                         ->select('reserves.*', 'users.name as user_name', 'users.email as user_email', 'users.id as user_id', 'flights.id as flight_id', 'flights.date as flight_date')
                         ->paginate($totalPage);
        return $reserves;
    }
}
