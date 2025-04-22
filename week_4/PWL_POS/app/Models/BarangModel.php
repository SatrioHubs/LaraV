<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
 class BarangModel extends Model
 {
     use HasFactory;
 
     public function kategori(): BelongsTo
     {
         // JS4: Praktikum 2.7 / One to Many (Inverse) / Belongs To
         return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
     }
 }