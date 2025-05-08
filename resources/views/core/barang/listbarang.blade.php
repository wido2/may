<div class="p-4">


    <livewire:barang-table />

    @if ($showModalBarang)
        <dialog class="modal modal-open ">
            <div class="modal-box">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                    wire:click="closeModalBarang">✕</button>
                <form wire:submit.prevent="store">
                    <h3 class="font-bold text-lg">Add a Barang</h3>
                    <p class="py-4">Add an Barang to database</p>

                    <div class="grid grid-cols-6 gap-4">

                        <div class="col-start-1 col-end-7">
                            <fieldset class="fieldset w-full">
                                <legend class="fieldset-legend">Barang Name</legend>
                                <input type="text" wire:model="name" class="input w-full" placeholder="Type here" />
                                @error('name')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset w-full">
                                <legend class="fieldset-legend">Description</legend>
                                <textarea wire:model="description" class="textarea w-full" placeholder="Category Description"></textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>
                            

                        </div>

                        <div class="col-start-1 col-end-4 ">
                            <fieldset class="fieldset">
                            <legend class="fieldset-legend">Price</legend>
                            
                                <input type="number" wire:model="price" class="input w-full" placeholder="Type here" />
                                @error('price')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                           </fieldset>
                        </div>
                        <div class="col-start-4 col-end-7 ">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Stock</legend>
                                 
                                <input type="number" wire:model="stock" class="input w-full" placeholder="Type here" />
                                
                                @error('stock')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-start-1 col-end-4 ">
                        <div class="col-start-4 col-end-7 ">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Category</legend>
                                <select wire:model="category_id" class="select w-full">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>
                        </div>
                        </div>
                        <div class="col-start-4 col-end-7 ">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Satuan</legend>
                                <select wire:model="satuan_id" class="select w-full">
                                    <option value="">Select Satuan</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}">{{ $satuan->name }}</option>
                                    @endforeach
                                </select>
                                @error('satuan_id')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                    <div class='flex justify-end py-5'>

                        <button type="submit" class="btn btn-block"> <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#3b82f6"
                                    d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <path fill="#10b981" d="M17 21v-8H7v8z" />
                                <path fill="#f59e0b" d="M7 3v5h8v-5z" />
                            </svg> Save !</button>
                    </div>

                </form>
            </div>
        </dialog>
    @endif


</div>
