<x-app-layout>

   <div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Suppliers</h1>
    <a href="{{ route('suppliers.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded mb-4">+ Add New Supplier</a>

    <form action="{{ route('suppliers.index') }}" method="GET" class="mb-4">
            <input type="text" name="company" placeholder="Enter Company Name"
                   value="{{ request('company') }}"
                   class="border px-3 py-2 rounded">
            <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">
                Search
            </button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   

        <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Company</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr>
                        <td class="border px-4 py-2">{{ $supplier->id }}</td>
                        <td class="border px-4 py-2">{{ $supplier->name }}</td>
                        <td class="border px-4 py-2">{{ $supplier->email }}</td>
                        <td class="border px-4 py-2">{{ $supplier->phone }}</td>
                        <td class="border px-4 py-2">{{ $supplier->company }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('suppliers.show', $supplier) }}" class="text-blue-500">View</a>
                            <a href="{{route('suppliers.edit', $supplier->id)}}">Edit</a>
                            <form action="{{route('suppliers.destroy', $supplier->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form> 
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">No suppliers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
   
<div>
    {{ $suppliers->links() }}
</div>
</x-app-layout>
