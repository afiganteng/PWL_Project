<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    public $timestamps= false;
    protected $primaryKey = 'id_pelanggan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'foto', 'jk', 'alamat', 'tgl', 'jenis','nopol'];

    public function servismotor(){
        return $this->hasMany(ServisMotor::class);
    }
}
