<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class HomepageController extends Controller
{
    public function index()
    {
        $flowers = Flower::all();
        return view('homepage', compact('flowers'));
    }



    public function flower($id)
    {
        $flower = Flower::where('id', $id)->first();

        if ($flower==null)
        {
            return('<h1>404 error</h1>');
        }

        $pathfoto = "storage\\laravel\\flower1.jpg";
        $data = [
            'name' => $flower->name,
            'type' => $flower->type,
            'description' => $flower->description,
            'photo_name' => $pathfoto,
        ];
        return view('object', $data);
    }
    public function p2()
    {
        $name = 'Мега объект';
        $text = 'Объект мега, тут и обсуждать нечего' ;
        $data = [
            'name' => $name,
            'text' => $text
        ];
        return view('object', $data);
    }
}
