<div class="px-5">
    <x-slot name="breadcrumb">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                <li>Admin</li>
                <li>{{ $breadcrumb }}</li>
                </ul>
                <a href="{{ route("admin.products") }}" class="button blue">
                    <span>All products</span>
                </a>
                
            </div>
        </section>
    </x-slot>
    <x-slot name="header">
        <h1>{{ $title }}</h1>
    </x-slot>
    <div class="py-12">
        <form wire:submit="save" class="nmax-w-sm mx-auto">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-gray-900">Product name</label>
                    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900  w-full" wire:model="form.name" required placeholder="Enter product name">
                    <div>
                        @error('form.name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-5">
                <label for="price" class="block mb-2 text-gray-900">Product price</label>
                <input type="number" id="priceext-gray-900" wire:model="form.price" required placeholder="Enter product price"  class="bg-gray-50 border border-gray-300 text-gray-900  w-full">
                    <div>
                        @error('form.price') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-gray-900">Product description</label>
                <textarea wire:model="form.description" required  id="description" class="block p-2,5 text-gray-900 border border-gray-300 w-full" rows="4"></textarea>
                <div>
                    @error('form.description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select Category</label>
                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.blur="form.category_id">
                        <option selected>Choose a category</option>
                        @foreach ($categories as $key => $value )
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-5">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Select Brand</label>
                    <select id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.blur="form.brand_id">
                        <option selected>Choose a brand</option>
                        @foreach ($brands as $key => $value )
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-5">
                <div class="flex items-center justify-center w-full mt-4">
                    <label for="dropzone-file" class="flex items-center justify-between w-full h-64 border-2 border-gray-300
                    border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex-col flex-1 items-center pt-5 pb-6">
                    @if ($form->oldCover) 
                        <img src="{{ asset(Storage::url($form->oldCover)) }}" class="object-cover h-48">
                    @endif
                    @if ($form->cover) <img src="{{ $form->cover->temporaryUrl() }}" class="object-cover h-48
                    w-96">@endif
                    </div>
                    <div class="flex-col flex-1 items-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"><path stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0
                    0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2
                    2"/></svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> image</p>
                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" wire:model="form.cover" />
                    </label>
                </div>
            </div>


            <fieldset>
                <legend class="sr-only">Status</legend>
                <div class="flex items-center justify-between mb-4">
                    @foreach ($productStatus as $status)
                    <input type="radio" wire:model="form.status" value="{{$status->value}}" id="status">
                    <label for="status" class="block mb-2 text-gray-900">{{ $status->name}}</label>
                    
                    @endforeach
                </div>
            </fieldset>

            <button type="submit" class="bg-blue-700 text-white px-5 py-2.5">Update</button>

        </form>
    </div>
</div>
