<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\AttributeTypeListLayout;
use App\Models\AttributeType;
use Orchid\Screen\Actions\Link; 
use Orchid\Screen\Screen;


class AttributeTypeListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeTypeListScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'AttributeTypeListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'attribute-types' => AttributeType::paginate()
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
            Link::make('Create New AttributeType')
                ->icon('pencil')
                ->route('platform.attribute-type.edit')
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
            AttributeTypeListLayout::class
        ];
    }
}
