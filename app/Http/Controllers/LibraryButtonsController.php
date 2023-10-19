<?php

namespace App\Http\Controllers;

use App\Models\LibraryButtons;
use Illuminate\Http\Request;

class LibraryButtonsController extends Controller
{
    public function index() {
        $buttons = LibraryButtons::all();

        return response()->json($buttons);
    }
}
