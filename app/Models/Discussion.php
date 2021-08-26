<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['Titre', 'Message','auteur_de_discussion','id_salon'];
    use HasFactory;
}
