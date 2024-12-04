<x-app-layout>
    <h1>Add Drug</h1>
    <form action="{{route('drugs.store')}}" method="POST">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="supplier" :value="__('Supplier')" />
            <x-text-input id="supplier" class="block mt-1 w-full" type="text" name="supplier" :value="old('supplier')" required autofocus autocomplete="supplier" />
            <x-input-error :messages="$errors->get('supplier')" class="mt-2" />
        </div>
        {{-- <button type="submit">Add Drug</button> --}}
        <x-primary-button class="ms-4">
            {{ __('Add Drug') }}
        </x-primary-button>
    </form>


</x-app-layout>
