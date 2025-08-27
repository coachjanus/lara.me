<x-admin>

    <x-slot name="breadcrumb">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                <li>Admin</li>
                <li>{{ $breadcrumb }}</li>
                </ul>
                <a href="{{ route("admin.categories.create") }}" class="button blue">
                    <span>Create new</span>
                </a>
                
            </div>
        </section>
    </x-slot>

    @if (count($categories)>0)
        <div class="card has-table">
            <x-slot name="header">
                <header class="card-header">
                    <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    {{ $title }}
                    </p>
                    <a href="#" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
                    
                </header>
            </x-slot>
        
            <div class="card-content">
                <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="image-cell">
                    {{ $category->id }}
                    </td>
                    <td data-label="Name">{{ $category->name }}</td>
                    
                    <td data-label="Created">
                    <small class="text-gray-500" title="{{ $category->created_at }}">{{ $category->created_at }}</small>
                    </td>
                    <td class="actions-cell">
                    <div class="buttons right nowrap">
                        <form method="POST" style="display:inline-block; margin:auto" action="{{ route('admin.categories.restore',$category->id) }}">
                        @csrf @method('POST')
                       
                        <button class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button>
</form>
                        <form method="POST" style="display:inline-block; margin:auto" action="{{ route('admin.categories.force',$category->id) }}">
                        @csrf @method('DELETE')
                            <button class="button small red --jb-modal" data-target="sample-modal" type="submit">
                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </form>       
                    </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    @else
        No categories yet
    @endif

</x-admin>