<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimentacao extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantidade',
        'data_movimentacao',
        'tipo',
        'produto_id',
        'user_id',
    ];

   public function produto():BelongsTo
   {
    return $this->belongsTo(Produto::class);
   }

   public function user():BelongsTo
   {
    return $this->belongsTo(User::class);
   }
}