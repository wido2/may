<?php

namespace App\Core\Satuan;

use App\Models\satuan;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class ListSatuan extends Component
{
    public $name = '';
    public $id='';
    public $description='';
    public ?satuan $satuan;
    public bool $showModal = false;
    public ?bool $is_active = null;

    #[Title('Satuan')]

    #[On('openModal')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function mount(satuan $satuan){
            $this->satuan = $satuan;
            $this->name = $satuan->name;
            $this->description = $satuan->description;
            $this->is_active = $satuan->is_active;
            $this->id = $satuan->id;
    }
    #[On('delete')]
    public function delete($rowId): void
    {
        satuan::find($rowId)->delete();
        redirect()->route('satuan');
    }
    
    #[On('edit')]
    public function edit($rowId): void
    {
        $this->openModal();
        $this->mount(satuan::find($rowId));
    }
    
    public function store(){
        $this->validate();
        satuan::updateOrCreate(
            ['id'=>$this->satuan->id],
            [
                'name'=>$this->name,
                'description'=>$this->description,
                'is_active'=>$this->is_active
            ]);
        $this->closeModal();
        return redirect()->route('satuan');
    }
    
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'is_active' => 'required|in:0,1',
        ];
    }


    public function closeModal()
    {
        $this->reset();
        $this->showModal = false;
    }

    public function render()
    {
        return view('core.satuan.list-satuan')->layout('layouts.app');
    }
}
