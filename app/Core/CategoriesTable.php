<?php

namespace App\Core;

use App\Core\Category\ListCategory;
use App\Models\category;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CategoriesTable extends PowerGridComponent
{
    public string $tableName = 'categories-table-u9mvvy-';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->includeViewOnBottom('components.btn.btnAddcategory')
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public string $sortField = 'name'; 

    public string $sortDirection = 'desc';

    public function datasource(): Builder
    {
        return category::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
        ->add('name')
        ->add('slug')
        ->add('description');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama', 'name')
            ->searchable()
            ->editOnClick(true),
            Column::make('Slug', 'slug'),
            Column::make('Deskripsi', 'description'),
            Column::action('Action', 'actions'),
        ];
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        category::query()->find($id)->update([
            $field => e($value),
        ]);
    }

    public function filters(): array
    {
        return [
        ];
    }


      

    #[On('delete')]
    public function delete($rowId, $name): void
    {
        category::query()->find($rowId)->delete();
        $this->dispatch('notify','Category '.$name.' deleted successfully', 'success');

    }
    public function actions(category $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete', [
                    'rowId' => $row->id,
                    'name' => $row->name
                
                ]),
            
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
