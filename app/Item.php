<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function purchase() {
        return $this->hasMany(Purchase::class);
    }

    public function sale() {
        return $this->hasMany(Sale::class);
    }
}
