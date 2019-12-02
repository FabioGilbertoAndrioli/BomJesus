<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    private $room;
    private $paginate = 4;

    public function __construct(Room $room){
        $this->room = $room;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = $this->room->orderBy('id','desc')->paginate($this->paginate);
        return view('dashboard.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.room.create-edit');
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

        $create = $this->room->create($data);
        $create->location()->create();
        if($create)
            return redirect()->route('room.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
        else
            return redirect()->route('room.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $room = $this->room->find($room->id);
        return view('dashboard.room.create-edit',compact('room'));
    }

    public function confirmDelete(Room $room){
        $room = $this->room->find($room->id);

        return view('dashboard.room.confirmDelete',compact('room'));
    }

    public function delete(Room $room){
        $room = $this->room->find($room->id);

        if($room->delete() && $room->location()->delete())
            return redirect()->route('room.index')->with(['success'=>"Reserva deletada com sucesso"]);
        else
            return redirect()->route("room.edit",['id' => $room->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        if($room->update($request->all()))
            return redirect()->route('room.index')->with(['success'=>"Sala editada com sucesso"]);
        else
            return redirect()->route("room.edit",['id' => $room->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
