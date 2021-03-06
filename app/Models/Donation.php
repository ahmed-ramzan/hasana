<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function users()
    {
        return $this->belongsTo(User::class,'donor_id');
    }

    public function campaigns()
    {
        return $this->belongsTo(Donation::class);
    }
}
