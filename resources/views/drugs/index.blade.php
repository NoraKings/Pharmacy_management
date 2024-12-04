<x-app-layout>
{{-- @include('app.blade.php') --}}
<h1>LIST OF DRUGS</h1>
    <a href="{{route('drugs.create')}}">Add New Drug</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drugs as $drug)
                    <tr>
                        <td>{{$drug->name}}</td>
                        <td>{{$drug->category}}</td>
                        <td>{{$drug->description}}</td>
                        <td>{{$drug->supplier}}</td>
                        <td>{{$drug->quantity}}</td>
                        <td>{{$drug->price}}</td>
                        <td>{{$drug->expiry_date}}</td>
                        <td>
                            <a href="{{route('drugs.show', $drug->id)}}">View</a>
                            <a href="{{route('drugs.edit', $drug->id)}}">Edit</a>
                            <form action="{{route('drugs.destroy', $drug->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
        <div>
            {{$drugs->links()}}
        </div>
</x-app-layout>