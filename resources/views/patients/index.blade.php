<x-app-layout>

    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Patients</h1>

        <form action="{{ route('patients.index') }}" method="GET" class="mb-4">
            <input type="text" name="patient_id" placeholder="Enter Patient ID"
                   value="{{ request('patient_id') }}"
                   class="border px-3 py-2 rounded">
            <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">
                Search
            </button>
        </form>

        <a href="{{ route('patients.create') }}" class="bg-blue-500  text-black px-4 py-2 rounded">
            + Add New Patient
        </a>

        <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Patient ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">File No</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Type</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td class="border px-4 py-2">{{ $patient->patient_id }}</td>
                        <td class="border px-4 py-2">{{ $patient->name }}</td>
                        <td class="border px-4 py-2">{{ $patient->file_no }}</td>
                        <td class="border px-4 py-2">{{ $patient->email }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($patient->type) }}</td>
                        <td class="border px-4 py-2">{{ $patient->phone }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('patients.show', $patient) }}" class="text-blue-500">View</a>
                            <a href="{{route('patients.edit', $patient->id)}}">Edit</a>
                            <form action="{{route('patients.destroy', $patient->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form> 
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">No patients found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $patients->links() }}
        </div>
    </div>
</x-app-layout>
    

{{-- <h1>PATIENTS</h1>
    <a href="{{route('patients.create')}}">Add New Patient</a>
        <table>
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>File No</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->file_no}}</td>
                        <td>{{$patient->patient_id}}</td>
                        <td>{{$patient->email}}</td>
                        <td>{{$patient->phone}}</td>
                        <td>{{$patient->type}}</td>
                        <td>
                            <a href="{{route('patients.show', $patient->id)}}">View</a>
                            <a href="{{route('patients.edit', $patient->id)}}">Edit</a>
                            <form action="{{route('patients.destroy', $patient->id)}}">
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
            {{$patients->links()}}
        </div>

    </x-app-layout> --}}