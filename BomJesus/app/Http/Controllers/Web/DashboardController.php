<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Dashboard;
use Illuminate\Http\Request;
use App\Charts\ReportsChart;
use App\Charts\SampleChart;
use App\Models\Reserve;
use App\User;
use DB;


class DashboardController extends Controller
{
    private $reserve;

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
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

         $reserves = $this->reserve->reserveChart();

        $chart = new SampleChart;
        $usercharts = new SampleChart;
        foreach($reserves as $reserve){
            $chart->labels[] =  strftime('%b %Y', strtotime($reserve->dat));
            $qtd[] = $reserve->qtd;
        }
        $chart->dataset('Reserva mensal de chromebook', 'bar',$qtd);

        $users = User::all();

        foreach($users as $user){
            $name = explode(" ",$user->name);
            $usercharts->labels[] =  $name[0];
            $qtdUser[] = $user->reserve->count();

        }

        $usercharts->dataset('Reserva por professor', 'bar',$qtdUser);


        return view('dashboard.home.index',compact('chart','usercharts'));
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
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
