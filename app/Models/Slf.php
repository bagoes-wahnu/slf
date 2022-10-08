<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slf extends Model
{
    use HasFactory;

    protected $primaryKey = 'gid';

    protected $guarded = [];

    public $timestamps = false;

    // public $incrementing = false;

    protected $table = 'slf';
}
