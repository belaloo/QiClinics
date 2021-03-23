<?php
declare(strict_types=1);

namespace App\Http\Controllers\DTOs;

use App\Models\MedicalRecord;
use Spatie\DataTransferObject\DataTransferObject;

final class MedicalDTO extends DataTransferObject
{
    public int $id;

    public string $name;

    public static function fromModel(MedicalRecord $medicalRecord): MedicalDTO
    {
        return new static([
            'id' => $medicalRecord->id,
            'name' => $medicalRecord->name,
            'create_ad' => $medicalRecord->created_at,
            'updated_at' => $medicalRecord->updated_at,
        ]);
    }
}
