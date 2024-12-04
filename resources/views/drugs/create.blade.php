<x-app-layout>
    <x-card class="mx-auto max-w-lg mt-24 p-10">
        <div class="text-center">
            <h1 class="text-2xl font-bold">Add Drug</h1>
        </div>
        <form action="{{route('drugs.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="category" :value="__('category')" />
                <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus autocomplete="category" />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="description" :value="__('description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="supplier" :value="__('Supplier')" />
                <x-text-input id="supplier" class="block mt-1 w-full" type="text" name="supplier" :value="old('supplier')" required autofocus autocomplete="supplier" />
                <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="quantity" :value="__('quantity')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required autofocus autocomplete="quantity" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="price" :value="__('price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="expiry_date" :value="__('expiry_date')" />
                <x-text-input id="expiry_date" class="block mt-1 w-full" type="text" name="expiry_date" :value="old('expiry_date')" required autofocus autocomplete="expiry_date" />
                <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" />
            </div>
            {{-- <button type="submit">Add Drug</button> --}}
            <x-primary-button class="ms-4">
                {{ __('Add Drug') }}
            </x-primary-button>
        </form>
    </x-card>

</x-app-layout>
