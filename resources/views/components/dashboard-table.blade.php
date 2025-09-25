<div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-4">
    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">
        {{ $title }}
    </h3>

    <!-- Table for larger screens -->
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    @foreach ($columns as $column)
                        <th class="border border-gray-200 dark:border-gray-700 px-3 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ $column }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                        @foreach ($columns as $column)
                            @php
                                $key = \Illuminate\Support\Str::snake(strtolower($column));
                                $value = $item->$key ?? '-';

                                // Apply dynamic badge logic
                                $badgeClass = '';
                                if ($key === 'quantity') {
                                    if ($value < 10) {
                                        $badgeClass = 'bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold';
                                    } elseif ($value < 30) {
                                        $badgeClass = 'bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold';
                                    } else {
                                        $badgeClass = 'bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold';
                                    }
                                }

                                if ($key === 'expiry_date' && $value !== '-') {
                                    $daysLeft = \Carbon\Carbon::parse($value)->diffInDays(now(), false);
                                    if ($daysLeft <= 0) {
                                        $badgeClass = 'bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold';
                                        $value = "Expired ($value)";
                                    } elseif ($daysLeft < 30) {
                                        $badgeClass = 'bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold';
                                    }
                                }
                            @endphp
                            <td class="border border-gray-200 dark:border-gray-700 px-3 py-2 text-sm text-gray-800 dark:text-gray-100">
                                @if ($badgeClass)
                                    <span class="{{ $badgeClass }}">{{ $value }}</span>
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="text-center text-gray-500 dark:text-gray-400 py-4">
                            No data available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Card view for mobile -->
    <div class="grid grid-cols-1 gap-4 md:hidden">
        @forelse ($items as $item)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 shadow-sm bg-gray-50 dark:bg-gray-700">
                @foreach ($columns as $column)
                    @php
                        $key = \Illuminate\Support\Str::snake(strtolower($column));
                        $value = $item->$key ?? '-';
                        $badgeClass = '';

                        if ($key === 'quantity') {
                            if ($value < 10) $badgeClass = 'bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold';
                            elseif ($value < 30) $badgeClass = 'bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold';
                            else $badgeClass = 'bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold';
                        }

                        if ($key === 'expiry_date' && $value !== '-') {
                            $daysLeft = \Carbon\Carbon::parse($value)->diffInDays(now(), false);
                            if ($daysLeft <= 0) {
                                $badgeClass = 'bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold';
                                $value = "Expired ($value)";
                            } elseif ($daysLeft < 30) {
                                $badgeClass = 'bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold';
                            }
                        }
                    @endphp
                    <div class="flex justify-between text-sm py-1 border-b border-gray-200 dark:border-gray-600 last:border-none">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $column }}:</span>
                        @if ($badgeClass)
                            <span class="{{ $badgeClass }}">{{ $value }}</span>
                        @else
                            <span class="text-gray-800 dark:text-gray-100">{{ $value }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @empty
            <p class="text-center text-gray-500 dark:text-gray-400 py-4">No data available</p>
        @endforelse
    </div>
</div>
