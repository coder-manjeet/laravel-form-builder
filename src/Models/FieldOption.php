<?php

namespace CoderManjeet\LaravelFormBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FieldOption extends Model
{
    use HasFactory;
    
    protected $fillable = ['field_id', 'name', 'value'];

    public function field(): BelongsTo {
        return $this->belongsTo(FormField::class);
    }
}
