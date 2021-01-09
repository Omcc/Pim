<?php

namespace App\Orchid\Layouts;

use App\Models\AttributeType;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class AttributeTypeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attribute-types';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('type_name', 'Type')
                
                ->render(function (AttributeType $attributeType) {
                    return Link::make($attributeType->type_name)
                        ->route('platform.attribute-type.edit', $attributeType->id);
                }),

            TD::make('created_at','Created'),   
            
            TD::make('updated_at','Last edit')
    

        ];
    }
}
