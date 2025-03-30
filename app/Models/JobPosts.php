<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Response;
use Storage;
use Str;

class JobPosts extends Model
{
    protected $fillable = [
        'company_name',
        'company_logo',
        'title',
        'description',
        'experience',
        'salary',
        'location',
        'extra',
        'skills'
    ];

    protected function skills(): Attribute {
        return Attribute::make(
            get: function (string $value) {
                if (!$value) return [];

                $skillIds = explode(',', $value);
                return Skills::whereIn('id', $skillIds)->get();
            }
        );
    }

    protected function extra(): Attribute {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value)
        );
    }

    protected function salary(): Attribute {
        return Attribute::make(
            get: fn (string $value) => Str::doesntContain($value, 'Lacs PA') ? Str::of($value)->append(' Lacs PA') : $value
        );
    }

    protected function experience(): Attribute {
        return Attribute::make(
            get: fn (string $value) => Str::doesntContain($value, 'Yrs') ? Str::of($value)->append(' Yrs') : $value
        );
    }

    protected function companyLogo(): Attribute {
        return Attribute::make(
            get: fn(string $value) => Storage::url($value)
        );
    }
}
