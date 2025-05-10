<?php

namespace App\Core\Barang;

use App\Models\barang;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Title;

class Listbarang extends Component
{
    #[Title('Barang')]

    public $id='';
    public $name='';
    public $description='';
    public $category_id='';
    public $satuan_id='';
    public $stock=0;
    public $price=0;
    public bool $showModalBarang = false;
    public ?barang $barang=null;

    #[On('openModalBarang')]
    public function openModalBarang()
    {
        $this->showModalBarang = true;
    }
    public function closeModalBarang()
    {
        $this->reset();
        $this->showModalBarang = false;
    }
    public function mount(barang $barang){
        $this->barang = $barang;
        $this->id = $barang->id;
        $this->name = $barang->name;
        $this->description = $barang->description;
        $this->category_id = $barang->category_id;
        $this->satuan_id = $barang->satuan_id;
        $this->stock = $barang->stock;
        $this->price = $barang->price;
    }

    #[On('edit')]
    public function edit($rowId): void
    {
        $this->openModalBarang();
        $this->mount(barang::find($rowId));
    }

    #[On('delete')]
    public function delete($rowId): void
    {
        barang::find($rowId)->delete();
        redirect()->route('barang');
    }

    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required',
            'satuan_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }

    public function store(){
        $this->validate();
        barang::updateOrCreate(
            ['id'=>$this->barang->id],
            [
                'name'=>$this->name,
                'description'=>$this->description,
                'category_id'=>$this->category_id,
                'satuan_id'=>$this->satuan_id,
                'stock'=>$this->stock,
                'price'=>$this->price
            ]);
        $this->closeModalBarang();
        return redirect()->route('barang');
    }
    public function render()
    {
        return view('core.barang.listbarang',[
            'categories' => \App\Models\Category::all(),
            'satuans' => \App\Models\Satuan::all()
        ])->layout('layouts.app');
    }
}
