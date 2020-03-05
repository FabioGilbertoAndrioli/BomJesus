<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserve;
use Carbon\Carbon;
use App\User;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
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
        // $reserves = $this->reserve->find(1);
        // dd(url("storage/users/{}"));
        $reserves = $this->reserve->with(['user','car'])->where('date', '>=', Carbon::today())->orderBy('date','desc')->get();
            return response()->json(['reservas' => $reserves]);
    }


    public function showUser($id){
        $reserve = Reserve::find($id);
        $user = $reserve->user;

        return response()->json(['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
