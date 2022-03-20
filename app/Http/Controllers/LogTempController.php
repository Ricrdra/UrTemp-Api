<?php

namespace App\Http\Controllers;

use App\Http\Resources\LogResource;
use App\Models\LogTemp;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LogTempController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LogResource::collection(LogTemp::all());
    }

    public function store(Request $request): LogResource
    {
        $log = LogTemp::create($request->all());
        return new LogResource($log);
    }

    public function show(LogTemp $logTemp): LogResource
    {
        return new LogResource($logTemp);
    }

    public function update(Request $request, LogTemp $logTemp): LogResource
    {
        $logTemp->update($request->all());
        return new LogResource($logTemp);
    }

    public
    function destroy(LogTemp $logTemp)
    {
        $logTemp->delete();
        return response()->json(null, 204);
    }
}
