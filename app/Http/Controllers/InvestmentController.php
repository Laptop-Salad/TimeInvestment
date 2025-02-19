<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestmentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index(Request $request): JsonResponse {
        $investments = auth()->user()->investments()
            ->latest('date')
            ->get();


        return response()->json(InvestmentResource::collection($investments));
    }
}
