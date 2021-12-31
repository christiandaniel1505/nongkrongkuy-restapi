<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    protected $table="lists"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
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
        'image',
        'alamat',
        'link'
    ];

    public function menu()
    {
       return $this->hasMany(Menu::class);
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('img/' . $this->image)))
            return unlink(public_path('img/' . $this->image));
    }
}
