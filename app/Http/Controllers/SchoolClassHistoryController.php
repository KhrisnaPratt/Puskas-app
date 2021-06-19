<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SchoolClassHistoryController extends Controller
{
    public function index()
    {
        return view('school_classes.history.index', [
            'school_classes' => SchoolClass::onlyTrashed()->get()
        ]);
    }

    public function restore(int $id): RedirectResponse
    {
        SchoolClass::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('kelas.index.history')->with('success', 'Data berhasil dikembalikan!');
    }

    public function destroy(int $id): RedirectResponse
    {
        SchoolClass::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('kelas.index.history')->with('success', 'Data berhasil dihapus!');
    }
}