<?php

namespace App\Core;

use App\Models\barang;
use App\Models\category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class BarangTable extends PowerGridComponent
{
    public string $tableName = 'barang-table-ec8tgg-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->includeViewOnBottom('components.btn.btnAddbarang')
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return barang::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {       
        //  $options = $this->categorySelectOptions();

        return PowerGrid::fields()
            ->add('name')
            ->add('description')
            ->add('stock')
            ->add('price')
            ->add('price_formatted',function($barang){
                return Number::currency($barang->price, in: 'IDR', locale: 'id_ID');
            })

            ->add('category_name', function ($barang) {
                return $barang->category->name;
            })
            ->add('satuan_id', function ($barang) {
                return $barang->satuan->name;
            })
            ->add('created_at')
            ->add('created_at_formatted', function ($barang) {
                return Carbon::parse($barang->created_at)->format('d/m/Y');
            });
    }
    // public function categorySelectOptions(): Collection
    // {
    //     return category::all(['id', 'name'])->mapWithKeys(function ($category) {
    //         return [$category->id => $category->name];
    //     });
    // }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        if ($field === 'price_formatted') { 

            //Override the field
            $field = 'price'; 
            
            // Parse the value
            // 10.000,00 $ => 10000.00
            $value = str($value)->replace('.', '')
                ->replace(',', '.')
                ->replaceMatches('/[^Z0-9\.]/', '')
                ->toString();
        }
        barang::query()->find($id)->update([
            $field => e($value),
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Stock', 'stock')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Price', 'price_formatted')
                ->sortable()
                ->editOnClick(
                    
                )
                ->searchable(),

            Column::make('Category', 'category_name')
                ->sortable()
                ->searchable(),

            Column::make('Satuan', 'satuan_id')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    

    public function actions(barang $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white btn dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->class('pg-btn-white btn dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete', ['rowId' => $row->id]),
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
