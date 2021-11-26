<?php

namespace App\Traits\Livewire;

trait CustomTable
{
    /**
     * Handle sort column on table head
     *
     * @param  string $column
     * @return void
     */
    public function sortColumn($column)
    {
        $this->order = $column;
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';
        $this->dispatchBrowserEvent('init');
    }

    /**
     * Handle reset filters
     *
     * @param  mixed $var
     * @return void
     */
    public function resetVar($var)
    {
        $this->filters[$var] = [
            'label' => null,
            'val' => null,
        ];
        $this->dispatchBrowserEvent('init');
    }

    /**
     * Handle toggle filters
     * eg. is_active ? [yes, no, all]
     *
     * @param  mixed $var
     * @param  mixed $val
     * @param  mixed $label
     * @return void
     */
    public function toggle($var, $val, $label)
    {
        $this->filters[$var] = [
            'label' => $label,
            'val' => $val,
        ];
        $this->dispatchBrowserEvent('init');
    }
}