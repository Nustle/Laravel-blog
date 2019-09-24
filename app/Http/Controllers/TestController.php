<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CounterInterface;

class TestController extends BaseController
{
    protected $request;
    protected $counter;

    public function __construct(Request $request, CounterInterface $counter)
    {
        $this->request = $request;
        $this->counter = $counter;
    }

    public function about()
    {
        $name = $this->request->input('name');

        return view('test.about', [
            /*'name' => $name,
            'age' => $request->input('age')*/
        ]);
    }

    public function digit()
    {

            $this->counter->increment();
            $this->counter->increment();

            echo $this->counter->getValue();

    }
}
