<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Side;
use Illuminate\Support\Facades\Log;

class MapController extends Controller
{
    //
    public function index() {
        $maps = Map::all();
        return view('maps.index')->with('maps', $maps);
    }

    public function create() {
        return view('maps.create');
    }

    public function store(Request $request) {
        // Log::info(json_decode($request->getContent(), true));
        // move_order

        // local.INFO: array (
        //     'destination' => 'dest',
        //     'voice_command_string' => 'voice',
        //     'directions' => 
        //     array (
        //       0 => 
        //       array (
        //         'side' => 'Forward',
        //         'meters' => '1',
        //       ),
        //       1 => 
        //       array (
        //         'side' => 'Forward',
        //         'meters' => '1',
        //       ),
        //       2 => 
        //       array (
        //         'side' => 'Left',
        //         'meters' => '1',
        //       ),
        //       3 => 
        //       array (
        //         'side' => 'Right',
        //         'meters' => '1',
        //       ),
        //     ),
        //   )  

        $data = json_decode($request->getContent(), true);

        $map = new Map;
        
        $map->dest_name = $data['destination'];
        $map->voice_command = $data['voice_command_string'];

        $map->save();

        foreach ($data['directions'] as $index => $dir)
        {
            $sideId = Side::where('name', $dir['side'])->first()->id;
            $map->sides()->attach($sideId, [
                'meters'=>$dir['meters'],
                'move_order' => ($index+1)
                ]);
        }

        return response()->json([
            'mapId' => $map->id,
        ], 200);
    }

    public function destroy($id)
    {
        $id = (int) $id;
        $map = Map::where('id', $id)->first();

        if ($map === null)
        {
            return response()->json([], 400);
        }

        $map->delete();

        // return response()->json([
        //     'message' => 'Deleted successfully'
        // ], 200);
        return redirect()->route('maps.index');
    }

    public function details(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $destName = $data['dest_name'];

        $map = Map::where('voice_command', $destName)->first();

        if ($map === null) {
            return response()->json(json_encode([
                'error' => 'Unkown '.$destName
            ]), 400);
        }

        $sides = [];
        foreach ($map->sides as $side)
        {
            $sides[] = [
                'side' => $side->name,
                'meters' => $side->pivot->meters,
                'order' => $side->pivot->move_order
            ];
        }

        $details = [
            'dest_name' => $map->dest_name,
            'voice_command' => $map->voice_command,
            'directions' => $sides,
        ];

        return response()->json([
            json_encode($details)
        ], 200);
    }

}
