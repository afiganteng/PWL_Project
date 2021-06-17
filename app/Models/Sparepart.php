<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sparepart;

class Sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';
    public $timestamps= false;
    protected $primaryKey = 'id_sparepart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_sparepart', 'sparepart', 'stok', 'harga'];

    public function servismotor(){
        return $this->hasMany(ServisMotor::class);
    }
}
