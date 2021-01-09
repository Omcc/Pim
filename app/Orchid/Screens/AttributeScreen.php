<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\AttributeListLayout;
use App\Models\Attribute;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class AttributeScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'AttributeScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'attributes' => Attribute::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create New Attribute')
                ->icon('pencil')
                ->route('platform.attribute.edit'),
                
            Link::make('List Attribute Types')
                ->icon('pencil')
                ->route('platform.attribute-type.list')
                
        ];

        
    }

    /**
     * Views.
     *
     * @return string[]|Layout[]
     */
    public function layout(): array
    {
        return [
            AttributeListLayout::class
        ];
    }
}
