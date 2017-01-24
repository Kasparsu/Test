<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Maid extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'rate', 'img'
    ];

    public function counties()
    {
        return $this->belongsToMany('App\County');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function workHours()
    {
        return $this->hasMany('App\WorkHours');
    }
}