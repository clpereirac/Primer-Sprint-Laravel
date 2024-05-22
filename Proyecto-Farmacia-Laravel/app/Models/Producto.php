<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fotografia',
        'descripcion',
        'precio',
        'stock',
        'lote',
        'fecha_de_vencimiento',
    ];
    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }
}
