<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class State extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'states';
    protected $primaryKey = '_id';

}
