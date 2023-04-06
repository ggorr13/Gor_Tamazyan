<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private readonly CarService $carService)
    {
    }

    public function index(Request $request)
    {
        $mark = $request->get('mark_id');
        $type = $request->get('type_id');

        $cars = $this->carService->filterPublishedCars($mark, $type);

        return view('home', compact('cars'));
    }
}
