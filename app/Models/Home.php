<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table="homes"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel menu
    protected  $primaryKey = 'id';
    public $timestamps= false; 
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'title',
        'content',
        'title2',
        'content2'
    ];
}
