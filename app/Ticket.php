<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    protected $fillable = [
        'category_id', 'subject', 'description', 'priority','status',
    ];

}
