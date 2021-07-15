<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class postagem extends Model
{
    protected $table = 'postagens';
    protected $fillable = ['titulo','subtitulo','texto','imagem','visualizacoes'];

    use softDeletes;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
