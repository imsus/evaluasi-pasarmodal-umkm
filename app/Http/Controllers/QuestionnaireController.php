<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use Validator;
use PDF;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::latest()->get();

        return view('kuesioner.index', compact('questionnaires'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('kuesioner.show', compact('questionnaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('kuesioner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Validator::make($request->except(['_token']), [
            'kontak_nama' => 'required'
        ], [
            'kontak_nama.required' => 'Nama perusahaan wajib diisi.'
        ])->validate();

        $questionnaire = new Questionnaire;
        $questionnaire->fill($request->all());
        $questionnaire->user_id = auth()->user()->id;

        $questionnaire->save();

        // dd($questionnaire);

        return redirect()->route('questionnaire.show' , $questionnaire->id)
                         ->withMessage('Kuesioner ' . $questionnaire->id . ' sudah dibuat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('kuesioner.edit', compact(['questionnaire']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->except(['_token']), [
            'kontak_nama' => 'required'
        ], [
            'kontak_nama.required' => 'Nama perusahaan wajib diisi.'
        ])->validate();

        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->fill($request->all());
        $questionnaire->user = auth()->user()->username;

        // dd($questionnaire);

        return redirect()->route('questionnaire.show', $id)
                         ->withMessage('Kuesioner ' . $id . ' sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $questionnaire = Questionnaire::find($id);
        $questionnaire->delete();
        return redirect()->route('questionnaire.index')
                         ->withMessage('Kuesioner ' . $id . ' telah dihapus.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function print($id)
    {
        $questionnaire = Questionnaire::find($id);
        $pdf = PDF::loadView('kuesioner.print', compact(['questionnaire']));
        return $pdf->stream();
        // return $pdf->download('kuesioner-' . $id . '.pdf');
        // $pdf = PDF::loadView('pdf.single', array('kuesioner' => $questionnaire));
    }
}
