<?php

namespace App\Livewire;

use App\Livewire\Forms\CampanhaCreateForm;
use App\Models\Campanha;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateCampanha extends Component
{
    public CampanhaCreateForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect('/campanha');
    }

    public function render()
    {
        return view('livewire.campanha.create-campanha');
    }
}
