<?php

namespace Controllers;

use Models\UserModel;

class UsersController extends Controller
{
    public function index(){
        $users = UserModel::all();
        response()->json(["message" => "Todos los usuarios", "data" => $users]);
    }
}
