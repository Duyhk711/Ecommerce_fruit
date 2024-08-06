<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\TrangThaiDH;
use Illuminate\Http\Request;

class TrangThaiDHController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Trạng thái đơn hàng";
        $listTH = TrangThaiDH::orderBy('id')->get();
        return view('admins.contents.trangthaiDH.index',[
            'title' => $title,
            'listTH' => $listTH
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
