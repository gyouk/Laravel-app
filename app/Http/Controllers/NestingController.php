<?php

namespace App\Http\Controllers;

/**
 * Class NestingController
 */
class NestingController extends Controller
{
    public function getNestedJson($nestingCount)
    {

        $this->nestingCount = (int) $nestingCount;

        $nestedJson = $this->generateNestedJson();

        return response()->json($nestedJson);
    }

    /**
     * @return array|null[]|null
     */
    private function generateNestedJson()
    {
        $result = null;

        for ($i = $this->nestingCount; $i >= 1; $i--) {
            $result = ["level_$i" => $result];
        }

        return $result;
    }
}
