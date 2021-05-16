<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'places' => Place::all(),
            'user_id' => Auth::id(),
        ];
        // Post::onlyTrashed()->where('user_id', Auth::id())->restore();
        $places = Place::all();
        return view('places.index', $data);  //compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::id() == null)
            return redirect('places/');
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request() -> validate([
            'name' => 'required|max:100',
            'type' => 'max:50',
            'short_info' => 'required|max:400',
            'full_info' => ''
        ]);
        $data['user_id'] = Auth::id();
        $x = Place::create($data);
        $x->setType(request()->type);
        $user = Auth::id();
        $x->user_id = Auth::id();
        $x->save();
        return redirect('/places');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $data = [
            'place' => $place,
            'user_id' => Auth::id(),
        ];
        return view('places.show', $data); //compact('place')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        if (Auth::id() != $place->user_id or Auth::id() == null)
            return redirect('places/'.$place->id);
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        if ($place->user_id != Auth::id() or Auth::id() == null)
        {
            return redirect('/places/'.$place->id);
        }
        $data = request() -> validate([
            'name' => 'required|max:100',
            'type' => 'max:50',
            'short_info' => 'required|max:400',
            'full_info' => ''
        ]);
        $place->update($data);
        $place->setType(request()->type);
        $place->save();
        $data = [
            'place' => $place,
            'user_id' => Auth::id(),
        ];
        return view('places.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        if (Auth::id() != $place->user_id or Auth::id() == null)
            return redirect('places/'.$place->id);
        $place->delete();
        return redirect('/places');
    }

    public function uploadphoto(Request $request, Place $place)
    {
        if (Auth::id() != $place->user_id or Auth::id() == null)
            return redirect('places/'.$place->id);
        request() -> validate([
            'image' => 'required',
        ]);
        //$request->file('image')->getClientOriginalName();
        //$photo_name = $request->file('image')->getClientOriginalName();
        $place->photo_name = $request->file('image')->store('laravel', 'public');
        $place->save();
        return redirect('/places/'.$place->id);
    }
}
