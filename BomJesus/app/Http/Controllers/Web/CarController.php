<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{


    private $car;
    private $paginate = 2;

    public function __construct(Car $car){
        $this->car = $car;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->car->orderBy('id','desc')->paginate($this->paginate);
        return view('dashboard.car.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.car.create-edit");
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

        $create = $this->car->create($data);
        if($create)
            return redirect()->route('car.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
        else
            return redirect()->route('car.index')->withErrors(['errors'=>'Falha ao cadastrar']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $car = $this->car->find($car->id);
        return view("dashboard.car.create-edit",compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        if($car->update($request->all()))
            return redirect()->route('car.index')->with(['success'=>"Reserva editada com sucesso"]);
        else
            return redirect()->route("car.edit",['id' => $car->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }


    public function confirmDelete(Car $car){
        $car = $this->car->find($car->id);

        return view('dashboard.car.confirmDelete',compact('car'));
    }

    public function delete(Car $car){
        $car = $this->car->find($car->id);

        if($car->delete())
            return redirect()->route('car.index')->with(['success'=>"Reserva deletada com sucesso"]);
        else
            return redirect()->route("car.edit",['id' => $car->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
