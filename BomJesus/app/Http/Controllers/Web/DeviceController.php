<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    private $device;
    private $paginate = 10;

    public function __construct(Device $device){
        $this->device = $device;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = $this->device->orderBy('id','desc')->paginate($this->paginate);
        return view('dashboard.device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('dashboard.device.create-edit',compact('rooms'));
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

        $data['room_id'] = 2;
        $create = $this->device->create($data);
        if($create)
            return redirect()->route('device.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
        else
            return redirect()->route('device.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $device = $this->device->find($device->id);
        $rooms = Room::all();
        return view('dashboard.device.create-edit',compact('device','rooms',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $data['room_id'] = 2;
        if($device->update($request->all()))
            return redirect()->route('device.index')->with(['success'=>"Dispositivo editado com sucesso"]);
        else
            return redirect()->route("device.edit",['id' => $device->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }

    public function confirmDelete(Device $device){
        $device = $this->device->find($device->id);

        return view('dashboard.device.confirmDelete',compact('device'));
    }

    public function delete(Device $device){
        $device = $this->device->find($device->id);

        if($device->delete())
            return redirect()->route('device.index')->with(['success'=>"Dispositivo deletado com sucesso"]);
        else
            return redirect()->route("device.edit",['id' => $device->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
