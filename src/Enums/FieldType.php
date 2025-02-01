<?php

namespace CoderManjeet\LaravelFormBuilder\Enums;

enum FieldType: string
{
    case BUTTON = 'button';
    case CHECKBOX = 'checkbox';
    case COLOR = 'color';
    case DATE = 'date';
    case DATETIME_LOCAL = 'datetime-local';
    case EMAIL = 'email';
    case FILE = 'file';
    case HIDDEN = 'hidden';
    case IMAGE = 'image';
    case MONTH = 'Month';
    case NUMBER = 'number';
    case PASSWORD = 'password';
    case RADIO = 'radio';
    case RANGE ='range';
    case RESET ='reset';
    case SEARCH = 'search';
    case SELECT = 'select';
    case STEP = 'step';
    case SUBMIT ='submit';
    case TEL = 'tel';
    case TEXT = 'text';
    case TEXTAREA = 'textarea';
    case TIME = 'time';
    case URL = 'url';
    case WEEK = 'week';

    public static function all() {
        return collect(self::cases())->map(fn ($case) => $case->value)->toArray();
    }
}