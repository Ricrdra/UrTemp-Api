<?php

namespace App\Http\Controllers;

use App\Helpers\QueryResolvers;
use App\Http\Resources\LogResource;
use App\Models\LogTemp;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\InputBag;

class LogTempController extends Controller
{
    private array $resolvers =
        [
            'created_at' => 'dateResolver',
            'gender' => 'noResolve',
            'student_id' => 'noResolve',
            'area' => 'noResolve',
            'classroom_id' => 'noResolve'
        ];

    public function index(Request $request): AnonymousResourceCollection|string
    {
        $collection = $this->resolveQuery($request->query);
        return LogResource::collection($collection);
    }

    private function resolveQuery(InputBag $query): Collection
    {
        $keys = array_keys($this->resolvers);

        $logs = LogTemp::all()->toArray();
        $logs = array_map(function ($item) {
            $student = Student::find($item['id']);
            $item['gender'] = $student->gender;
            $item['name'] = $student->person->name;
            $item['area'] = $student->classroom->area;
            $item['classroom_id'] = $student->classroom->id;
            return $item;
        }, $logs);

        $data = array_reduce($keys, function ($carry, $key) use ($query) {
            if ($query->has($key)) {
                $param = $query->get($key);
                return array_filter($carry, function ($element) use ($param, $key) {
                    $method = $this->resolvers[$key];
                    $expected = QueryResolvers::$method($element[$key]);
                    return $param === $expected;
                });
            }
            return $carry;
        }, $logs);
        return Collection::make($data);
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

    public function destroy(LogTemp $logTemp)
    {
        $logTemp->delete();
        return response()->json(null, 204);
    }

    public function getToday()
    {
        $logs = LogTemp::whereDate('created_at', date('Y-m-d'))->get();
        return response()->json($logs, 200);
    }

}
