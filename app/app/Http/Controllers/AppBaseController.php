<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters)
    {
        $controller = class_basename(get_class($this)); //EX: return => ProjetController
        $action = $method;  //EX: return => index
        // Remove only the last occurrence of "Controller"
        if ($controller === 'GestionControllersController') {
            $changeName = preg_replace('/Controller$/', '', $controller); // return => Controller

        } else {
            $changeName = str_replace(['Controller', '@'], ['', '-'], $controller); //EX: return => Projet
        }

        $permissions = $action . '-' . $changeName . 'Controller'; //EX: return => index-ProjetController
        // dd($permissions);
        $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }
}