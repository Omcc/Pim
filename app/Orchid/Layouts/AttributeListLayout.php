<?php

namespace App\Orchid\Layouts;
use App\Models\Attribute;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class AttributeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attributes';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('frontend_label', 'Label')
                
                ->render(function (Attribute $attribute) {
                    return Link::make($attribute->frontend_label)
                        ->route('platform.attribute.edit', $attribute->attribute_id);
                }),

            TD::make('created_at','Created'),
            
            TD::make('updated_at','Last edit')
    

        ];
    }
}
