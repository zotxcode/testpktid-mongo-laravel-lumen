<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
	protected $connection = 'mongodb';
    protected $collection = 'customers';
    protected $primaryKey = '_id';
    
}
