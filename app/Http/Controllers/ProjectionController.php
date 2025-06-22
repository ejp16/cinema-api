<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;

class ProjectionController extends Controller
{
    public function addProjection(Request $request)
    {
        Projection::create(
            [
                'movie_id' => $request->movie_id,
                'theater_id' => $request->theater_id,
                'start_date' => $request->start_date
            ]
            );
    }

    public function updateProjection(Request $request, string $id)
    {
        $projection = Projection::find($id);

        $projection->update($request);
    }

    public function Projections()
    {
        return Projection::all();
    }

    public function removeProjection(string $id)
    {
        Projection::destroy($id);
    }


}
