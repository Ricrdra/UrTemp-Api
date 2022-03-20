<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            "name" => $this->person->name,
            "last_name" => $this->person->last_name,
            "phone_number" => $this->person->phone_number,
            "enrollment_number" => $this->enrollment,
            "temp_logs" => $this->resolveLogs(),
            "classroom" => [
                'name' => $this->classroom->class_name,
                'area' => $this->classroom->area,
            ],
        ];
    }

    private function resolveLogs(): array
    {
        $logs = [];
        foreach ($this->logs as $log) {
            $logs[] = [
                "date" => $log->created_at,
                "temp" => $log->temp,
                "allowed" => $log < 37
            ];
        }
        return $logs;
    }
}
