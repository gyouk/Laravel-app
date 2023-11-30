<?php

namespace App\Http\Controllers;

/**
 * Class FibonacciController
 */
class FibonacciController extends Controller
{
    public function getFibonacciNumber($index)
    {
        $index = (int) $index;

        if ($index < 0) {
            return response()->json(['error' => 'Індекс повинен бути більше 0.'], 400);
        }

        $fibonacciNumber = $this->calculateFibonacci($index);

        return response()->json(['index' => $index, 'fibonacciNumber' => $fibonacciNumber]);
    }

    /**
     * @return string
     */
    private function calculateFibonacci($n)
    {
        $fib = ['0', '1'];
        /**
         * Add bcadd bibliotec to use big integer.
         */
        for ($i = 2; $i <= $n; $i++) {
            $fib[$i] = bcadd($fib[$i - 1], $fib[$i - 2]);
        }

        return $fib[$n];
    }
}
