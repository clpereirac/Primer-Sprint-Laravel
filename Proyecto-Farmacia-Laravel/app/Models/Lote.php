<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'lotes';

    // Los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'producto_id', // ID del producto al que pertenece el lote
        'lote', // Número de lote
        'fecha_de_vencimiento', // Fecha de vencimiento del lote
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
