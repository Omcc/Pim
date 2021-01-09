<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class AttributeType extends Model
{
    use asSource;
    protected $table ='attribute_type';
    protected $primaryKey = 'id';
    
     /**
     * @var array
     */
    protected $fillable = [
        'type_name',
        'frontend_input',
    ];
}
