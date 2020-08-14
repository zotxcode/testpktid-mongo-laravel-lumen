<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Transaction extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'transactions';
    protected $primaryKey = '_id';

    public function showAll() {
    	return $this->load('connote');
    }

    public function connote()
    {
        return $this->hasOne('App\Connote');
    }

}
