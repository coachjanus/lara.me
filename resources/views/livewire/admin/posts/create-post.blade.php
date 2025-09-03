<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit="save">
        <input type="text" wire:model="post_title">
        <div>
            @error('post_title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <input type="text" wire:model="content">
        <div>
            @error('content') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Save</button>
    </form>
</div>
