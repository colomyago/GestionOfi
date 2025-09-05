<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;

class GeminiController extends Controller
{
    protected $gemini;

    public function __construct(GeminiService $gemini)
    {
        $this->gemini = $gemini;
    }

    public function index()
    {
        return view('index');
    }

    public function chat(Request $request)
    {
        try {
            $validated = $request->validate([
                'prompt' => 'required|string|max:1000'
            ]);

            $respuesta = $this->gemini->prompt($validated['prompt']);

            return response()->json([
                'status' => 'success',
                'respuesta' => $respuesta
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}