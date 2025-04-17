<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // store and show

    public function index()
    {
        // Fetch all registers
        $registers = Register::all();
        // Return the view with the registers data
        return view('edit.editpage-program', compact('registers'));
    }

    public function create()
    {
        return view('register.register');
    }

    public function store(Request $request)
    {
        $register = new Register();
        $register->tmula = $request->tmula;
        $register->takhir = $request->takhir;
        $register->nama = $request->nama;
        $register->kategori = $request->kategori;
        $register->anjuran = $request->anjuran;
        $register->penganjur = $request->penganjur;
        $register->tempoh = $request->tempoh;
        $register->lokasi = $request->lokasi;
        $register->ykos = $request->ykos;
        $register->pkos = $request->pkos;
        $register->save();

        return redirect()->route('register.index')->with('success', 'Program Telah Didaftar.');
    }

    // Display a listing of the records
    public function editPageProgram()
    {
        // Fetch all records from the Register model
        $registers = Register::all();

        // Pass the $registers variable to the view using compact
        return view('edit.editpage-program', compact('registers'));
    }


    //edit

    // Show the edit form
    public function edit($id)
    {
        $register = Register::findOrFail($id);
        return view('edit.edit-program', compact('register'));
    }

    // Update the record
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'tmula' => 'required|date',
            'takhir' => 'required|date',
            'nama' => 'nullable|string',
            'kategori' => 'nullable|string',
            'anjuran' => 'required|string',
            'penganjur' => 'nullable|string',
            'tempoh' => 'nullable|integer',
            'lokasi' => 'nullable|string',
            'ykos' => 'nullable|numeric',
            'pkos' => 'nullable|numeric',
        ]);

        // Find the record and update it
        $register = Register::findOrFail($id);
        $register->tmula = $request->tmula;
        $register->takhir = $request->takhir;
        $register->nama = $request->nama;
        $register->kategori = $request->kategori;
        $register->anjuran = $request->anjuran;
        $register->penganjur = $request->anjuran == 'EXT' ? $request->penganjur : 'PKPP';
        $register->tempoh = $request->tempoh;
        $register->lokasi = $request->lokasi;
        $register->ykos = $request->ykos;
        $register->pkos = $request->pkos;
        $register->save();

        // Redirect back to the edit page with success message
        return redirect()->route('edit.editpage-program')->with('success', 'Program Telah Diubbah!');
    }

    // Delete the record
    public function destroy($id)
    {
        $register = Register::find($id);
        if ($register) {
            $register->delete();
            return redirect()->route('register.index')->with('success', 'Program Telah Dipadam.');
        } else {
            return redirect()->route('register.index')->with('error', 'Register not found.');
        }
    }
}
