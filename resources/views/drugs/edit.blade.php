<x-app-layout>
    <x-card class="mx-auto max-w-lg mt-24 p-10">
        <div class="text-center">
            <h1 class="text-2xl font-bold">Update Drug</h1>
        </div>
        <form action="{{route('drugs.update', $drug->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$drug->name}}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="category" :value="__('category')" />
                <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" value="{{$drug->category}}" required autofocus autocomplete="category" />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="description" :value="__('description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$drug->description}}" required autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-6">
                <label for="supplier_id">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control" required>
                        <option value="" disabled selected>{{$drug->supplier ?$drug->supplier->name : 'No Supplier'}}</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">
                                {{$supplier->name}}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="mb-6">
                <x-input-label for="quantity" :value="__('quantity')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" value="{{$drug->quantity}}" required autofocus autocomplete="quantity" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="price" :value="__('price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" value="{{$drug->price}}" required autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="expiry_date" :value="__('expiry_date')" />
                <x-text-input id="expiry_date" class="block mt-1 w-full" type="text" name="expiry_date" value="{{$drug->expiry_date}}" required autofocus autocomplete="expiry_date" />
                <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" />
            </div>
            {{-- <button type="submit">Add Drug</button> --}}
            <x-primary-button class="ms-4">
                {{ __('Update Drug') }}
            </x-primary-button>
        </form>
    </x-card>

</x-app-layout>
