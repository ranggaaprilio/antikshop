<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
// use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;
use App\Models\Category;

class CreateProductForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('product.store'))
            ->method('POST')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Input::make('name')->class('mt-4')->label('Name of Product'),
            Input::make('slug')->class('mt-4')->label('Slug'),
            Input::make('price')->class('mt-4')->label('Price'),
            Input::make('stok')->class('mt-4')->label('Stok'),
            Select::make('category_id')->class('mt-4')->label('Category')->options(Category::all()->pluck('name', 'id')->toArray()),
            File::make('images[]')->multiple()->filepond()->preview()->class('mt-4')->label('Upload Your Product Image'),
            Textarea::make('description')->class('mt-4')->label('Description'),
            Submit::make()->class('mt-5')->label('Create'),
        ];
    }
}
