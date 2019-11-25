<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Chromebook;
use App\Models\Car;
use Illuminate\Http\Request;

class ChromebookController extends Controller
{

    private $chromebook;
    private $paginate = 10;

    public function __construct(Chromebook $chromebook){
        $this->chromebook = chromebook;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $chromebooks = $this->chromebook->orderBy('id','desc')->paginate($this->paginate);
        return view('dashboard.chrome.index',compact('chromebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('dashboard.chrome.create-edit',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $create = $this->chromebook->create($data);
        if($create)
            return redirect()->route('chromebook.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
        else
            return redirect()->route('chromebook.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chromebook  $chromebook
     * @return \Illuminate\Http\Response
     */
    public function show(Chromebook $chromebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chromebook  $chromebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Chromebook $chromebook)
    {
        $chromebook = $this->chromebook->find($chromebook->id);
        $cars = Car::all();
        return view('dashboard.chrome.create-edit',compact('chromebook','cars',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chromebook  $chromebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chromebook $chromebook)
    {
        $data['room_id'] = 2;
        if($chromebook->update($request->all()))
            return redirect()->route('chromebook.index')->with(['success'=>"Chromebook editado com sucesso"]);
        else
            return redirect()->route("chromebook.edit",['id' => $chromebook->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }

    public function confirmDelete(chromebook $chromebook){
        $chromebook = $this->chromebook->find($chromebook->id);

        return view('dashboard.chrome.confirmDelete',compact('chromebook'));
    }

    public function delete(chromebook $chromebook){
        $chromebook = $this->chromebook->find($chromebook->id);

        if($chromebook->delete())
            return redirect()->route('chromebook.index')->with(['success'=>"Dispositivo deletado com sucesso"]);
        else
            return redirect()->route("chromebook.edit",['id' => $chromebook->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chromebook  $chromebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chromebook $chromebook)
    {
        //
    }
}
