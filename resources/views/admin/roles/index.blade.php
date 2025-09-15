<x-app-layout>
  <div class="container mx-auto">
    <x-slot name="header">
        <h1><?=$title?></h1>
    </x-slot>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Role name
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$role->name}}
                    </th>
                    
                    <td class="px-6 py-4">
                    {{$role->created_at}}
                    </td>
                    <td class="px-6 py-4 inline-flex">
                        <a href="{{ route('admin.roles.edit', $role->id) }}"><button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit</button></a>&nbsp;
                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" style="display:inline-block; margin:auto;">
                            @csrf @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>

    {{ $roles->links() }}

  </div>
</x-app-layout>
