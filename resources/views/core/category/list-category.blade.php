<div>

    <div class="px-4 py-1">
        <livewire:categories-table />
    </div>
    <!-- DaisyUI Modal -->
    @if ($showModal)
        <dialog class="modal modal-open ">
            <div class="modal-box">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                    wire:click="closeModal">✕</button>
                <form wire:submit.prevent="store">

                
                    <h3 class="font-bold text-lg">Add a Category</h3>
                    <p class="py-4">Add an Category to database</p>

                    <div class="grid grid-cols-6 gap-4">

                        <div class="col-start-1 col-end-7">
                            <fieldset class="fieldset w-full">
                                <legend class="fieldset-legend">Category Name</legend>
                                <input type="text" wire:model.live.debounce.1000ms="name" class="input w-full"
                                    placeholder="Type here" />
                                @error('name')
                                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset w-full">
                                <legend class="fieldset-legend">Category Slug</legend>
                                <input type="text" wire:model="slug" class="input w-full" placeholder="" disabled />
                                @error('slug')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror

                                @if (!$errors->has('slug') && $slug)
                                    <p class="mt-2 text-sm text-green-600">Slug is available!</p>
                                @endif
                            </fieldset>
                            <fieldset class="fieldset w-full">
                                <legend class="fieldset-legend">Description</legend>
                                <textarea wire:model="description" class="textarea w-full" placeholder="Category Description"></textarea>
                                @error('name')
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
                            </svg> Create</button>
                    </div>

                </form>
            </div>
        </dialog>
    @endif


</div>
