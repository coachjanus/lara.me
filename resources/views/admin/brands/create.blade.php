<x-admin>
<div>

    <x-slot name="header">
        <h1 class="">{{ $title }}</h1>
    </x-slot>

    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Brand name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Text brand namen here">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Brand description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
   
    
</div>
</x-admin>