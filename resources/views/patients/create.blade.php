<x-app-layout>
    <x-card class="mx-auto max-w-lg mt-24 p-10">
    <div class="container">
        <h1>Create Patient</h1>
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <x-input-label for="patient_id" :value="__('Patient ID')" />
                <x-text-input id="patient_id" class="block mt-1 w-full" type="text" name="patient_id" :value="old('patient_id')" required autofocus autocomplete="patient_id" />
                <x-input-error :messages="$errors->get('patient_id')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="file_no" :value="__('File No')" />
                <x-text-input id="file_no" class="block mt-1 w-full" type="text" name="file_no" :value="old('file_no')" required autofocus autocomplete="file_no" />
                <x-input-error :messages="$errors->get('file_no')" class="mt-2" />
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
                <select name="type">
                    <option value="general">General</option>
                    <option value="staff">Staff</option>
                    <option value="amenity">Amenity</option>
                </select><br>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>
            <x-primary-button class="ms-4">
                {{ __('Add Patient') }}
            </x-primary-button>
        </form>
    </div>
    </x-card>
</x-app-layout>
