<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        try {
            Event::create([
                'name' => $data['name'],
                'event_meta' => json_encode($data['event_meta'])
            ]);

        } catch (\Exception $error) {
            return response()->json(['message' => $error->getMessage()]);
        }

        return response()->json(['message' => 'Register event successfully.']);
    }
}