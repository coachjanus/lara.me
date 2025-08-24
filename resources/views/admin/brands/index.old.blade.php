<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->

    {{-- dump($brands) --}}

    {{ $brands[0]->name }}
    @{{ name }}

    @if (count($brands)>0)
     <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
    {{-- $brands[0]->name --}}
    @foreach ($brands as $brand)
        <h3>{{ $brand->name }}</h3>

       
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

    @auth
    It's me
    @endauth

    @guest
    Ut's guest
    @endguest

    

    <p>Поточний час UNIX – {{ time() }}.</p>
<p>Copyright &copy; {{ date('Y') }}.</p>
</div>
