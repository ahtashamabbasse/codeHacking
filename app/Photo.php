<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ["photo"];
    protected $dirtory="/images/";
    public function getPhotoAttribute($value)
    {
        return $this->dirtory.$value;
    }
}
