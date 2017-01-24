<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class WorkHours extends Model
{
    protected $fillable = [
        'start','end', 'day'
    ];

    public function maid()
    {
        return $this->belongsTo('App\Maid');
    }
}