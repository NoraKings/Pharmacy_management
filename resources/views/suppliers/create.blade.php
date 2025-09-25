<x-app-layout>
    <x-card class="mx-auto max-w-lg mt-24 p-10">
    <div class="container">
        <h1>Create Supplier</h1>
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            
            <div class="mb-6">
                <x-input-label for="company" :value="__('Company')" />
                <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="company" />
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>
            <x-primary-button class="ms-4">
                {{ __('Add Supplier') }}
            </x-primary-button>
        </form>
    </div>
    </x-card>
</x-app-layout>
