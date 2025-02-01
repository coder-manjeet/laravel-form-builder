<?php

namespace CoderManjeet\LaravelFormBuilder\Models;

use CoderManjeet\LaravelFormBuilder\Enums\FieldType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'status'];

    public function fields(): HasMany 
    {
        return $this->hasMany(FormField::class);
    }

    public function steps(): HasMany 
    {
        return $this->hasMany(FormField::class)->whereNull('parent_id');
    }

    public function fileFields(): HasMany 
    {
        return $this->hasMany(FormField::class)->where('type', FieldType::FILE);
    }
    
}
