<?php

namespace App\Core\Category;

use Livewire\Component;
use App\Models\category;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class ListCategory extends Component
{
    public $name = '';
    public $id='';
    public $slug='';
    public $description='';
    public bool $showModal = false;
    
    public $manuallyEditedSlug = false;
    public ?category $category;
    public function updatedName($value)
    {
        if (!$this->manuallyEditedSlug) {
            $this->slug = Str::slug($value);
            $this->validateOnly('slug');
        }
    }

    public function updatedSlug()
    {
        
        $this->manuallyEditedSlug = true;
        $this->validateOnly('slug');
    }

    #[Computed]
    public function generateSlug($value)
    {
        return Str::slug($value);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:categories,slug' // Validate against your table
            ],
        ];
    }


    #[On('openModal')]
    public function openModal()
    {
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function slug(){
        $this->slug = Str::slug($this->name);
    }

    public function mount(category $category){
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
        
    }

    public function store(){
        $this->validate();
        category::updateOrCreate(
            ['id'=>$this->category->id],
            [
                'name'=>$this->name,
                'slug'=>$this->slug,
                'description'=>$this->description
            ]);
        $this->closeModal();
        return redirect()->route('category');
    }
    

    #[On('edit')]
    public function edit($rowId): void
    {
        
        $this->openModal();
        $this->mount(category::find($rowId));
    }

    public function render()
    {
        return view('core.category.list-category');
    }
}
