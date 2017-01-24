<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = [
        'county'
    ];

    public function maids()
    {
        return $this->belongsToMany('App\Maid');
    }
}