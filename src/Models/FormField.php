<?php

namespace CoderManjeet\LaravelFormBuilder\Models;

use CoderManjeet\LaravelFormBuilder\Enums\FieldType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'label', 'type', 'settings', 'description', 'required'];

    protected $casts = [
        'type' => FieldType::class,
        'settings' => 'array'
    ];

    public function form(): BelongsTo {
        return $this->belongsTo(Form::class);
    }

    public function options(): HasMany {
        return $this->hasMany(FieldOption::class, 'form_field_id')->orderBy('sort_order');
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(FormField::class, 'parent_id');
    }

    public function children(): HasMany {
        return $this->hasMany(FormField::class, 'parent_id')->orderBy('sort_order');
    }

    public function scopeOfType($query, FieldType $type)
    {
        return $query->where('type', $type);
    }

}
