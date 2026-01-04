<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'priority',
    ];

    const PRIORITY_HIGH = '0';
    const PRIORITY_MEDIUM = '1';
    const PRIORITY_LOW = '2';

    public static function priorities()
    {
        return [
            self::PRIORITY_HIGH => 'High',
            self::PRIORITY_MEDIUM => 'Medium',
            self::PRIORITY_LOW => 'Low',
        ];
    }
}
