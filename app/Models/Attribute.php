<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Attribute extends Model
{
    use AsSource;
    protected $table ='eav_attribute';
    protected $primaryKey = 'attribute_id';

    /**
     * @var array
     */
    protected $fillable = [
        'entity_type_id',
        'attribute_code',
        'frontend_input',
        'frontend_label',
        'is_required',
        'default_value'
    ];
}
