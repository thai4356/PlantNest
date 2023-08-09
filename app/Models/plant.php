<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plant extends Model
{
    protected $table = 'plants';

    use HasFactory;

    protected $primaryKey ='id';
    protected $fillable =[
        'name',
        'description',
        'price',
        'image',
        'category_id'
    ];




}
