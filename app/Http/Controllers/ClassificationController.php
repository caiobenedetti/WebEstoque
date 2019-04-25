<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;
use Auth;

class ClassificationController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $classifications = Classification::orderBy('id', 'desc')->paginate(6);

        return view(
            'classifications.index',
            [
                'classifications' => $classifications
            ]
        );
            
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'descricao' => 'required|min:5|max:30'
        ];

        $messages = [
            'descricao.unique' => 'A classificação deve ser unica em toda a tabela'
        ];

        $request->validate($rules, $messages);

        $classification = new Classification;
        $classification -> descricao = $request->descricao;

        $classification->save();

        return redirect()
            ->route('classifications.index')
            ->with('status', 'Registro criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        $classification = Classification::findOrFail($id);

        return view(
            'classifications.show',[
                'classification' => $classification

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Localiza o registro pelo seu ID
        $classification = Classifications::findOrFail($id);

        // Chama a view com o formulário para edição do registro
        return view(
            'classifications.edit',
            [
                'classification' => $classification
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification)
    {
        $rules = [
            'descricao' => 'required|string|unique:classifications|min:5|max:30' 
        ];

        $messages = [
            'descricao.unique' => 'A classificação deve ser única em toda a tabela'
        ];

        $request->validate($rules, $messages);
        $classification = Classifications::findOrFail($id);
        $classification->descricao = $request->descricao;

        $classification->save();

        return redirect()
            ->route('classifications.index')
            ->with('status', 'Registro Atualizado com Sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        $classification = Classification::findOrFail($id);
        $classification->delete();

        return redirect()
            ->route('classifications.index')
            ->with('status','Registro excluido com sucesso');
    }
}
