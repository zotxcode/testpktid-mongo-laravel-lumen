<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Koli extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kolis';
    protected $primaryKey = '_id';


    public function connote()
    {
        return $this->belongsTo('App\Connote');
    }

}
