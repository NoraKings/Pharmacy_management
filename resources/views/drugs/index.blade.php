<x-app-layout>

   <div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Drugs</h1>

    <a href="{{ route('drugs.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded mb-4 inline-block">
        + Add New Drug
    </a>

    <form action="{{ route('drugs.index') }}" method="GET" class="mb-4">
        <input type="text" name="name" placeholder="Enter drug name"
            value="{{ request('name') }}"
            class="border px-3 py-2 rounded">
        <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">
            Search
        </button>
    </form>

    <table class="min-w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">S/N</th>
                <th class="border px-4 py-2">NAME</th>
                <th class="border px-4 py-2">CATEGORY</th>
                <th class="border px-4 py-2">DESCRIPTION</th>
                <th class="border px-4 py-2">SUPPLIER</th>
                <th class="border px-4 py-2">QUANTITY</th>
                <th class="border px-4 py-2">COST PRICE</th>
                <th class="border px-4 py-2">EXPIRY DATE</th>
                <th class="border px-4 py-2">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($drugs as $index => $drug)
                <tr>
                    <td class="border px-2 py-2">{{ $loop->iteration }}</td> <!-- Serial number -->
                    <td class="border px-2 py-2">{{ $drug->name }}</td>
                    <td class="border px-2 py-2">{{ $drug->category->name ?? 'No Category' }}</td>
                    <td class="border px-2 py-2">{{ $drug->description }}</td>
                    <td class="border px-2 py-2">{{ $drug->supplier->name ?? 'No Supplier' }}</td>
                    <td class="border px-2 py-2">{{ $drug->quantity }}</td>
                    <td class="border px-2 py-2">{{ $drug->cost_price }}</td>
                    <td class="border px-2 py-2">{{ $drug->expiry_date }}</td>
                    <td class="border px-2 py-2">
                        <a href="{{ route('drugs.show', $drug->id) }}" class="text-blue-500">View</a>
                        <a href="{{ route('drugs.edit', $drug->id) }}" class="text-yellow-500 ml-2">Edit</a>
                        <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 ml-2">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                 @empty
                <tr>
                    <td colspan="9" class="text-center p-4 text-gray-500">No Drugs</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $drugs->links() }}
    </div>
</div>

</x-app-layout>