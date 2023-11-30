<?php

namespace App\Http\Controllers;

class ApplesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getColorAtPosition($pattern, $index)
    {
        $patternLength = strlen($pattern);

        if ($patternLength === 0) {
            return response()->json(['error' => 'Pattern should not be empty.'], 400);
        }

        $colorIndex = $index % $patternLength;
        $color = $pattern[$colorIndex];

        return response()->json(['index' => $index, 'color' => $color]);
    }
}
