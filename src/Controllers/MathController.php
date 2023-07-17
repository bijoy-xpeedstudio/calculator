<?php

namespace Bijoy\Math\Controllers;

use Bijoy\Math\models\Calculator;
use Illuminate\Http\Request;
use Validator;

class MathController
{
    /**
     * 
     * this index funciton load view
     */
    public function index(Request $request)
    {
        $result = null;
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'type' => 'in:sum,minus,multiply,division',
                'value1' => 'required|numeric',
                'value2' => 'required|numeric',
            ]);

            $data = new Calculator();
            $data->val0 = $request->value1;
            $data->val1 = $request->value2;
            $data->type = $request->type;
            $data->save();

            if ($request->type == 'sum') {
                $result = $this->sum($request->value1, $request->value2);
            } elseif ($request->type == 'minus') {
                $result = $this->minus($request->value1, $request->value2);
            } elseif ($request->type == 'multiply') {
                $result = $this->multiply($request->value1, $request->value2);
            } elseif ($request->type == 'division') {
                $result = $this->division($request->value1, $request->value2);
            }

            return view('math::math.index', [
                'result' => $result,
                'request' => $request->input()
            ])->withErrors($validator);
        } else {
            return view('math::math.index')->withErrors([]);
        }
    }
    /** 
     * This function addition two value
     */
    public function sum(int $value0, int $value1)
    {
        return $value0 + $value1;
    }

    /**
     * This function substruction Two value
     */
    public function minus(int $value0, int $value1)
    {
        return $value0 - $value1;
    }

    /**
     * This funciton multiply Two value
     */
    public function multiply(int $value0, int $value1)
    {
        return $value0 * $value1;
    }

    /**
     * This function perfom division betwwen two value
     */
    public function division($value0, $value1)
    {
        if ($value0 != 0 && $value1 != 0) {
            return $value0 / $value1;
        } else {
            return 'can\'t use zero in division';
        }
    }
}
