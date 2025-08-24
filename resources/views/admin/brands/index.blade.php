<x-admin>
<div>

    <x-slot name="header">
        <h1 class="">{{ $title }}</h1>
    </x-slot>

    @if (count($brands)>0)
     <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
  
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    @else
    No brands yet
    @endif

    
    <p>Поточний час UNIX – {{ time() }}.</p>
    <p>Copyright &copy; {{ date('Y') }}.</p>
</div>
</x-admin>