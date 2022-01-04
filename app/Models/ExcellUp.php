<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcellUp extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $fillable = [
        'added_user_id',
        'coin_name',
        'watchlist',
        'status',
        'promote_position',
    ];

    public $table = 'coininfos';
    public $autoincrement = true;
    public $primarykey = 'id';
    public $keytype = 'int';
}
