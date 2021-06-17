<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServisMotor;

class ServisMotor extends Model
{
    use HasFactory;
    protected $table = 'servis_motor';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pelanggan_id', 
        'mekanik_id', 
        'sparepart_id', 
        'qty', 
        'harga_sparepart', 
        'harga_jasa', 
        'total_bayar',
        'tanggal'];

    public function mekanik(){
        return $this->belongsTo(Mekanik::class, 'mekanik_id', 'id_mekanik');
    }
    
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
    }

    public function sparepart(){
        return $this->belongsTo(Sparepart::class, 'sparepart_id', 'id_sparepart');
    }
}
