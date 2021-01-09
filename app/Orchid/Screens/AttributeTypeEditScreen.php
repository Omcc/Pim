<?php

namespace App\Orchid\Screens;

use App\Models\AttributeType;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class AttributeTypeEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeTypeEditScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'AttributeTypeEditScreen';

    public $exist=false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(AttributeType $attributeType): array
    {
        $this->exists = $attributeType->exists;

        if($this->exists){
            $this->name = 'Edit AttributeType';
        }
        
        return [
            'attribute-type' => $attributeType
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
            Button::make('Create Attribute')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows(
                [
                    Input::make('attribute-type.type_name')
                    ->title('Type Name')
                    ->placeholder('Attribute type name'),
                    Input::make('attribute-type.frontend_input')
                    ->title('Frontend Input')
                    ->placeholder('Frontend Input Field'),

                
                ])
    
        ];
    }

    public function createOrUpdate(AttributeType $attributeType, Request $request)
    {
        $attributeType->fill($request->get('attribute-type'))->save();
        

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.attribute-type.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(AttributeType $attributeType)
    {
        $attributeType->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.attribute-type.list');
    }
}
