<?php

namespace App\Orchid\Screens;

use App\Models\Attribute;
use App\Models\AttributeType;
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

class AttributeEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'AttributeEditScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'AttributeEditScreen';

    public $exist=false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Attribute $attribute): array
    {
        $this->exists = $attribute->exists;

        if($this->exists){
            $this->name = 'Edit Attribute';
        }
        
        return [
            'attribute' => $attribute
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
                    Input::make('attribute.entity_group_id')
                    ->title('Attribute Group')
                    ->placeholder('Attribute Group'),
                    Input::make('attribute.attribute_code')
                    ->title('Attribute Code')
                    ->placeholder('Attribute Code'),
                    
                

                    Relation::make('attribute.attribute_type')
                    ->title('Attribute Type')
                    ->fromModel(AttributeType::class,'type_name'),
                    
                ])
                ];
    }

    public function createOrUpdate(Attribute $attribute, Request $request)
    {
        $attribute->fill($request->get('post'))->save();
        

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.attribute.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Attribute $attribute)
    {
        $attribute->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.attribute.list');
    }
}
