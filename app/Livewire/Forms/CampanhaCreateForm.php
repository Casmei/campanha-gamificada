<?php

namespace App\Livewire\Forms;

use App\Jobs\ProcessaCriacaoDoGrupoCampanha;
use App\Models\Campanha;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CampanhaCreateForm extends Form
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('required|date')]
    public $start_date = '';

    #[Validate('required|date|after:start_date')]
    public $end_date = '';

    public function store()
    {
        $validated = $this->validate();

        // Adiciona o ID do usuário aos dados validados
        $validated['owner_id'] = Auth::id();

        $campanha = Campanha::create($validated);
        ProcessaCriacaoDoGrupoCampanha::dispatch($campanha);
    }
}
