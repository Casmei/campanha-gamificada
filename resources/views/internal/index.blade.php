<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campanha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div class="flex justify-end">
                <a href="{{ route('campanha.create') }}">
                    <x-primary-button>
                        {{ __('Criar nova Campanha') }}
                    </x-primary-button>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <livewire:campanha-table />
            </div>
        </div>
    </div>
</x-app-layout>
