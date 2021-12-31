<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListsResource;
use App\Models\Lists;
use App\Models\Menu;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function getAllCafe()
    {
        $data = Lists::all();
        return ListsResource::collection($data);
    }

    public function getMenuCafe($cafe_id)
    {
        $data = Menu::where('cafe_id', '=', $cafe_id)->get();
        return ListsResource::collection($data);
    }
}
