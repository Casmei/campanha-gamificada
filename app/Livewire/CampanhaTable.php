<?php

namespace App\Livewire;

use App\Models\Campanha;
use Carbon\Carbon;
use Livewire\Component;

class CampanhaTable extends Component
{
    public function copyToClipboard($link)
    {
        $this->dispatchBrowserEvent('copy-to-clipboard', ['link' => $link]);
    }

    public function render()
    {
        $campanhas = Campanha::with('owner')->get();
        return view('livewire.campanha.campanha-table', compact('campanhas'));
    }
}
