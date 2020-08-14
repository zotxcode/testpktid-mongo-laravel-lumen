<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PaymentType extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'payment_types';
    protected $primaryKey = '_id';
}
