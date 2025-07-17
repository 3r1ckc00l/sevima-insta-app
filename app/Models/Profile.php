<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function profileImage()
    {
      $imagePath = ($this->image) ? $this->image : 'profile/TTf1C63TJ3SSVpRYjbjdUVPHuPqDNTHBbD9Hwhgn.png';
      return '/storage/'.$imagePath;
    }

    public function followers()
    {
      return $this->belongsToMany(User::class);
    }

    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
