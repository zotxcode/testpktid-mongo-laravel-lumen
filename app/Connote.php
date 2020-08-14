<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Connote extends Eloquent
{

	protected $connection = 'mongodb';
    protected $collection = 'connotes';
    protected $primaryKey = '_id';

    public function transaction()
    {
        return $this->belongsTo('App\Connote');
    }

    public function kolis()
    {
        return $this->hasMany('App\Koli');
    }
    

}
