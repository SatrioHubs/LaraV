<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Relations\HasMany;
 
 class KategoriModel extends Model
 {
     use HasFactory;
 
     public function barang(): HasMany
     {
         // JS4: Praktikum 2.7 / One to Many
         return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
     }
 }