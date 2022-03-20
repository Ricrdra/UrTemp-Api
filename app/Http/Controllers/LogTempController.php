<?php

namespace App\Http\Controllers;

use App\Http\Resources\LogResource;
use App\Models\LogTemp;
use Illuminate\Http\Request;

class LogTempController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $log = LogTemp::create($request->all());
        return new LogResource($log);

    }

    public function show(LogTemp $logTemp)
    {
        //
    }

    public function update(Request $request, LogTemp $logTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\LogTemp $logTemp
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogTemp $logTemp)
    {
        //
    }
}
