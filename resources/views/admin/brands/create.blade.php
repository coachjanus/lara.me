<x-admin>

    <x-slot name="breadcrumb">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                <li>Admin</li>
                <li>{{ $breadcrumb }}</li>
                </ul>
                <a href="{{ route('admin.brands.index') }}" class="button blue">
                    <span>All brands</span>
                </a>
                
            </div>
        </section>
    </x-slot>

    <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          {{ $title }}
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="{{ route('admin.brands.store') }}">@csrf
          
          <div class="field">
            <label class="label">Name</label>

            <div class="control">
              <input name="name" class="input" type="text" placeholder="Brand name">
            </div>
            <p class="help">
              This field is required
            </p>
          </div>

          <div class="field">
            <label class="label">Description</label>
            <div class="control">
              <textarea class="textarea" placeholder="Brand descripti0on" name="description"></textarea>
            </div>
          </div>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
  </section>
</x-admin>