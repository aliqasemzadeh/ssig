<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TestModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.test-modal');
    }
}
