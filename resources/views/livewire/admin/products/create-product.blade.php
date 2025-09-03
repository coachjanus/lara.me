<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit="save">
        <input type="text" wire:model="name">
        <div>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <input type="text" wire:model="price">
        <div>
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>
        <input type="text" wire:model="description">
        <div>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <fieldset>
        <legend>Select a status:</legend>
        @foreach ($productStatus as $item)
        <div>
            <input type="radio" id="id{{ $item }}" wire:model="status" value="{{ $item->value }}" />
            <label for="huey">{{ $item->name }}</label>
        </div>
        @endforeach
        

        
        
        </fieldset>

        <button type="submit">Save</button>
    </form>
</div>
