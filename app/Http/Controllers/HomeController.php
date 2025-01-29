<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

include_once(app_path() . '\WebClientPrint\WebClientPrint.php');
use Neodynamic\SDK\Web\WebClientPrint;

class HomeController extends Controller
{
    public function index(){

        $wcppScript = WebClientPrint::createWcppDetectionScript(action([WebClientController::class, 'processRequest']), Session::getId());    

        return view('home.index', ['wcppScript' => $wcppScript]);
    }

    public function printFGL(){
        $wcpScript = WebClientPrint::createScript(action([WebClientController::class, 'processRequest']), action([PrintFGLController::class, 'printCommands']), Session::getId());    

        return view('home.printFGL', ['wcpScript' => $wcpScript]);
    }
}
