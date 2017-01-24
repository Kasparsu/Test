<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'start', 'end', 'token'
    ];

    protected $dates = ['deleted_at'];

    public function maid()
    {
        return $this->belongsTo('App\Maid');
    }

}