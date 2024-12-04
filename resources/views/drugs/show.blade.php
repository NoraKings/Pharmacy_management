<x-app-layout>
    <x-card class="p-5">

        
            <h1 class="font-bold text-xl">{{$drug->name}}</h1>
            <p>{{$drug->category}}</p>
            <p>{{$drug->description}}</p>
            <p>{{$drug->supplier}}</p>
            <p>{{$drug->quantity}}</p>
            <p>{{$drug->price}}</p>
            <p>{{$drug->expiry_date}}</p>
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