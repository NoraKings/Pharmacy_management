<x-app-layout>
    <x-card class="p-5">

        
            <h1 class="font-bold text-xl">{{$drug->name}}</h1>
            <p>{{$drug->Category}}</p>
            <p>{{$drug->description}}</p>
            <p>{{$drug->supplier ?$drug->supplier->name : 'No Supplier'}}</p>
            <p>{{$drug->quantity}}</p>
            <p>{{$drug->cost_price}}</p>
            <p>{{$drug->expiry_date}}</p>
            <h3>Selling Prices </h3>
            <ul>
                <li>General: {{$prices['general']}}</li>
                <li>Staff: {{$prices['staff']}}</li>
                <li>Amenity: {{$prices['amenity']}}</li>
                <li>Student: {{$prices['student']}}</li>
            </ul>
            <div>
                <a href="{{route('drugs.edit', $drug->id)}}">Edit</a>
                <form action="{{route('drugs.destroy', $drug->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
            <a href="{{route('drugs.index')}}">Back to List</a>
    </x-card>
</x-app-layout>