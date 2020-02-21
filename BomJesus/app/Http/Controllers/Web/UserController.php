<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    private $user;
    private $paginate = 8;
    public function __construct(User $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = $this->user->paginate($this->paginate);
        return view('dashboard.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.user.create-edit');
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

        $data['password'] = bcrypt('12345678');


         //verifica se existe a imagem
         if($request->hasFile('image')){
            $image = $request->file('image');

            //Definir o nome da imagem
            $nameFile = uniqid(date('YmdHi')).'.'.$image->getClientOriginalExtension();

            $upload = $image->storeAs('users',$nameFile);
            $data['image'] = $nameFile;
            if(!$upload)
                return redirect()
                        ->route("user.create")
                        ->withErrors(['errors'=>'Erro no upload'])
                        ->withInput();
         }

        $create = $this->user->create($data);
        if($create)
            return redirect()->route('user.index')->with(['success'=>"Cadastrado de usuário realizado com sucesso!"]);
        else
            return redirect()->route("user.create")->withErrors(['errors'=>'Falha ao cadastrar']);
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
    public function edit(User $user){

        $user = $this->user->find($user->id);
        return view('dashboard.user.create-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');

            //Definir o nome da imagem
            $nameFile = uniqid(date('YmdHi')).'.'.$image->getClientOriginalExtension();

            $upload = $image->storeAs('users',$nameFile);
            $data['image'] = $nameFile;
            if(!$upload)
                return redirect()
                        ->route("user.create")
                        ->withErrors(['errors'=>'Erro no upload'])
                        ->withInput();
         }

        if($user->update($data))
            return redirect()->route('user.index')->with(['success'=>"Usuário editado com sucesso"]);
        else
            return redirect()->route("user.edit",['id' => $user->id])
                            ->withErrors(['errors'=>'Falha ao editar'])
                            ->withInput();
    }

    public function confirmDelete(User $user){
        $user = $this->user->find($user->id);

        return view('dashboard.user.confirmDelete',compact('user'));
    }

    public function delete(User $user){
        $user = $this->user->find($user->id);

        if($user->delete())
            return redirect()->route('user.index')->with(['success'=>"Usuário deletado com sucesso"]);
        else
            return redirect()->route("user.edit",['id' => $user->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
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
