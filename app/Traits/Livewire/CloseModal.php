<?php

namespace App\Traits\Livewire;

trait CloseModal
{
    /**
     * When close button has been triggered, reset all properties
     *
     * @param  array $array
     * @return void
     */
    public function closeModal($array = [])
    {
        $this->reset($array);
    }
}