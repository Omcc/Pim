<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Action;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class Product extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Product';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Product';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return string[]|Layout[]
     */
    public function layout(): array
    {
        return [];
    }
}
