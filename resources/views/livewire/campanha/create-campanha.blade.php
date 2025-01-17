<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Criar Nova Campanha') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Preencha os dados para criar uma nova campanha.') }}
        </p>
    </header>

    <form wire:submit.prevent="save" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input wire:model="form.name" id="name" type="text" class="mt-1 block w-full"  />
            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Descrição')" />
            <x-text-input wire:model="form.description" id="description" class="mt-1 block w-full"  />
            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="start_date" :value="__('Data de Início')" />
            <x-text-input wire:model="form.start_date" id="start_date" type="date" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('form.start_date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="end_date" :value="__('Data de Término')" />
            <x-text-input wire:model="form.end_date" id="end_date" type="date" class="mt-1 block w-full"  />
            <x-input-error :messages="$errors->get('form.end_date')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>