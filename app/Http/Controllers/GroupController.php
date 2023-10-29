<?php

namespace App\Http\Controllers;

use App\Models\Group;


class GroupController extends Controller
{
    public function exportPdfView($id)
    {
        $group = Group::find($id);


        return view('livewire.export-pdf-view', compact('group'));

    }
}
