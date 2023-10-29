<?php

namespace App\Livewire;

use Barryvdh\DomPDF\PDF;
use Livewire\Component;


class ExportPdfView extends Component
{
    public static function pdf()
    {

        $pdf = PDF::loadView('livewire.export-pdf-view');
        return $pdf->stream();
    }

    public function render()
    {

        return $this->pdf();

    }
}
