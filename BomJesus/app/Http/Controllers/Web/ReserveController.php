<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Models\Car;
use Illuminate\Support\Facades\Date;
use App\Events\EventResponseReserve;


class ReserveController extends Controller
{

    private $reserve;
    private $paginate = 10;

    public function __construct(Reserve $reserve){
        $this->reserve = $reserve;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $reserve = $this->reserve->find(4);
        // dd($reserve->classes[0]);
        $reserves = $this->reserve->orderBy('date','desc')->paginate($this->paginate);

        return view('dashboard.agenda.index',compact('reserves'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //{{$reserve->user->contains($user) ? 'checked' : '' }}
        $users = User::all();
        $cars = Car::all();
        return view('dashboard.agenda.create-edit',compact('users','cars'));
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

        $create = true;//$this->reserve->create($data);
        //broadcast(new EventResponseReserve)->toOthers();
        if($create){
            broadcast(new EventResponseReserve)->toOthers();
            return redirect()->route('reserve.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
        }else
            return redirect()->route('reserve.index')->with(['success'=>"Cadastrado realizado com sucesso!"]);
    }


    public function search(Request $request){
        //dd($request->search);
        $request->search = str_replace('/', '-', $request->search);
        $request->search = date('Y-m-d', strtotime($request->search));
        $reserves = $this->reserve->where("date",$request->search)->orderBy('id','desc')->paginate($this->paginate);
        return view('dashboard.agenda.index',compact('reserves'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {
        $reserve = $this->reserve->find($reserve->id);
        $users = User::all();
        $cars = Car::all();
        return view('dashboard.agenda.create-edit',compact('reserve','users','cars'));
        //{{$reserve->user->contains($user) ? 'checked' : '' }}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {

        if($reserve->update($request->all()))
            return redirect()->route('reserve.index')->with(['success'=>"Reserva editada com sucesso"]);
        else
            return redirect()->route("reserve.edit",['id' => $reserve->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }

    public function confirmDelete(Reserve $reserve){
        $reserve = $this->reserve->find($reserve->id);

        return view('dashboard.agenda.confirmDelete',compact('reserve'));
    }

    public function delete(Reserve $reserve){
        $reserve = $this->reserve->find($reserve->id);

        if($reserve->delete()){
            broadcast(new EventResponseReserve)->toOthers();
            return redirect()->route('reserve.index')->with(['success'=>"Reserva deletada com sucesso"]);
        }else
            return redirect()->route("reserve.edit",['id' => $reserve->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        //
    }
}
