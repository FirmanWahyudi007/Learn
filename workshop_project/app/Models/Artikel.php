<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $PrimaryKey = 'id';
    protected $fillable = ['url_artikel', 'sampul', 'judul_artikel', 'isi_artikel','tanggal'];
}
