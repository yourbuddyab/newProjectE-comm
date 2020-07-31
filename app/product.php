<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =[
        'category_id','product','image','price','discount_price','description','availbleitems','packeage_count','featured'
    ];
}
