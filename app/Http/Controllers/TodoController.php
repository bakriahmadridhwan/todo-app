<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest();

        if (request('keyword')) {
            $todos->where('name', 'like', '%' . request('keyword') . '%');
        }

        return view('main.content', [
            "title" => "Daftar Semua TodoList",
            "todos" => $todos->get(),
        ]);
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
        $request->validate([
            'name' => 'required',
        ]);

        Todo::create([
            'name' => $request->name,
            'status' => '0',
        ]);

        return redirect('todos')->with('success', 'Todo baru berhasil ditambahkan!');
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
    public function update(Request $request, $idTodos)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = Todo::findOrFail($idTodos);

        $data->update([
            'name' => $request->name,
        ]);

        return redirect('todos')->with('success', 'Todo berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTodos)
    {
        // dari WPU
        // Todo::destroy($todo->id);

        $data = Todo::findOrFail($idTodos);
        $data->delete();
        return redirect('todos')->with('success', 'Todo berhasil dihapus!');
    }

    // check
    public function check(Request $request, $idTodos)
    {



        $data = Todo::findOrFail($idTodos);

        $data->update([
            'status' => '1',
        ]);

        return redirect('todos')->with('success', 'Todo berhasil diselesaikan!');
    }


    // restore
    public function restore(Request $request, $idTodos)
    {
        $data = Todo::findOrFail($idTodos);

        $data->update([
            'status' => '0',
        ]);

        return redirect('todos')->with('success', 'Todo berhasil di-restore kembali!');
    }

    // public function search()
    // {
    //     $todos = Todo::latest();

    //     if (request('keyword')) {
    //         $todos->where('name', 'like', '%' . request('keyword') . '%');
    //     }

    //     return view('main.content', [
    //         "title" => "Semua Todo",
    //         "todos" => $todos->get()
    //     ]);
    // }
}
