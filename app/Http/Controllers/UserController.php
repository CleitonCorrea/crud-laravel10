<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $user;

    public function __construct(){
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('users',["users"=> $this->user->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->user->create(
            [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "email_verified_at" => $request->input('email_verified_at'),
                "password" => md5($request->input('password'))
            ]
        );

        if($created){
            return redirect()->back()->with('messege',"Cadastro realizado com sucesso!");
        }else{
            return redirect()->back()->with("messege", 'Erro ao cadastrar!');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user_show',['user'=> $this->user->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return view('user_edit',['user'=> $this->user->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $updated = $this->user->where('id', $id)->update($request->except(['_token']));

        if($updated){
            return redirect()->back()->with('messege',"Atualizado com sucesso");
        }else{
            return redirect()->back()->with("messege", 'Erro ao atualizar!');

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->user->find($id)->delete();
        if($deleted){
            return redirect()->route('users.index')->with('messege',"Deletado com sucesso");
        }else{
            return redirect()->route('users.index')->with("messege", 'Erro ao excluir registro!');

        }
    }
}
