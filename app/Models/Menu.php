<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table="menus"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel menu
    protected  $primaryKey = 'id';
    public $timestamps= false; 
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'cafe_id',
        'title',
        'content',
        'image',
        'harga'
    ];

    public function lists()
    {
    	return $this->hasMany(Lists::class);
    }
}
