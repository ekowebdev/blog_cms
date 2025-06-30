<div class="bg-white shadow-md rounded-xl p-6 space-y-6">
    <div class="flex justify-between items-center">
        <x-mary-button icon="o-chevron-left" wire:click="previousMonth" rounded />
        <h2 class="text-lg font-bold text-gray-700">
            {{ \Carbon\Carbon::createFromDate($currentYear, $currentMonth)->translatedFormat('F Y') }}
        </h2>
        <x-mary-button icon="o-chevron-right" wire:click="nextMonth" rounded />
    </div>

    <div class="grid grid-cols-7 gap-2 text-center text-sm text-gray-600">
        @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $day)
            <div class="font-semibold">{{ $day }}</div>
        @endforeach

       @foreach($calendar as $day)
            @if ($day)
                @php
                    $isToday = $day['date'] === now()->toDateString();
                    $isSelected = $day['date'] === $selectedDate;
                    $hasPost = $day['has_post'];
                @endphp

                <button
                    wire:click="selectDate('{{ $day['date'] }}')"
                    class="rounded-lg p-2 border w-full aspect-square transition font-medium
                        {{ $isSelected ? 'bg-primary text-white border-primary' : '' }}
                        {{ $isToday ? 'bg-amber-500 text-white border-amber-500' : '' }}
                        {{ !$isSelected && !$isToday && $hasPost ? 'bg-emerald-100 text-emerald-700 border-emerald-300' : '' }}
                        {{ !$isSelected && !$isToday && !$hasPost ? 'bg-gray-50 hover:bg-gray-100 text-gray-700 border-gray-300' : '' }}"
                >
                    {{ $day['day'] }}
                </button>
            @else
                <div></div>
            @endif
        @endforeach

    </div>

    <div class="mt-4">
        <h3 class="font-bold text-gray-700 mb-2 text-sm">
            📌 {{ __('layout.card_calendar_title') }} {{ \Carbon\Carbon::parse($selectedDate)->format('d M Y') }}
        </h3>

        @forelse($posts as $post)
            <x-mary-card class="mb-3">
                <x-slot name="title">{{ $post->title }}</x-slot>
                <x-slot name="subtitle">{{ __('layout.card_calendar_published') }}: {{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}</x-slot>
            </x-mary-card>
        @empty
            <div class="text-sm text-gray-400">{{ __('layout.card_calendar_description') }}</div>
        @endforelse
    </div>
</div>
