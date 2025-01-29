<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include_once(app_path() . '\WebClientPrint\WebClientPrint.php');
use Neodynamic\SDK\Web\WebClientPrint;
use Neodynamic\SDK\Web\Utils;
use Neodynamic\SDK\Web\DefaultPrinter;
use Neodynamic\SDK\Web\InstalledPrinter;
use Neodynamic\SDK\Web\PrintFile;
use Neodynamic\SDK\Web\PrintRotation;
use Neodynamic\SDK\Web\PrintOrientation;
use Neodynamic\SDK\Web\TextAlignment;
use Neodynamic\SDK\Web\PrintFileTXT;
use Neodynamic\SDK\Web\ClientPrintJob;

use Session;
use Illuminate\Support\Facades\Storage; 

class PrintFGLController extends Controller
{
    public function printCommands(Request $request){
        
        if ($request->exists(WebClientPrint::CLIENT_PRINT_JOB)) {
 
             $useDefaultPrinter = ($request->input('useDefaultPrinter') === 'checked');
             $printerName = urldecode($request->input('printerName'));
             
             //Create BOCA FGL commands for sample label
             $cmds = '<rte>';
             $cmds .= '<RL><RC360,10><F3><HW1,1>GHOSTWRITER WORLD';
             $cmds .= '<RC380,76><F6><HW1,1><BS26,44>ALL<F2>';
             $cmds .= '<F6><BS26,44>THREE<F2>  <F6><BS26,44>PARKS';
             $cmds .= '<RC348,130><F6><HW1,1><BS42,44>PASSPORT';
             $cmds .= '<RC324,240><RL><F6><HW2,2>6';
             $cmds .= '<RC210,240><HW1,1>DAY';
             $cmds .= '<RC230,290><F3><HW1,1>ADMIT ONE';
             $cmds .= '<RC230,320><F6><HW1,1>GUEST';
             $cmds .= '<F1><RC230,370><F1><HW1,1>VERY SMALL PRINT';
             $cmds .= '<RC24,530><LT2><BX340,50>';
             $cmds .= '<RC25,528><LT2><VX338>';
             $cmds .= '<RC216,550><HW1,1><F2>DAY  1';
             $cmds .= '<RC24,580><LT2><BX340,50>';
             $cmds .= '<RC216,600>DAY  2';
             $cmds .= '<RC24,630><LT2><BX340,50>';
             $cmds .= '<RC216,650>DAY  3';
             $cmds .= '<RC24,680><LT2><BX340,50>';
             $cmds .= '<RC216,700>DAY  4';
             $cmds .= '<RC24,730><LT2><BX340,50>';
             $cmds .= '<RC25,780><LT2><VX338>';
             $cmds .= '<RC216,760>DAY  5';
             $cmds .= '<RC340,400><RL><F6><BS36,44><HW1,1>DAY GUEST';
             $cmds .= '<RC260,450><F3><HW1,1>$112.00';
             $cmds .= '<RC240,482><F3>PLUS TAX';
             $cmds .= '<RC280,1010><F3><HW1,1>12345678';
             $cmds .= '<RC60,990><NL10><X2>*01000407*';
             $cmds .= '<RC360,820><F9><HW1,1>VALID ONLY ON DATE STAMPED';
             $cmds .= 'NONTRANSFERABLE NONREFUNDABLE';
             $cmds .= '<RC280,870><F3><HW1,1>01000407';
             $cmds .= '<RC20,1079><RR><F3><HW1,1>GHOSTWRITER WORLD';
             $cmds .= '<p>';
 
             //Create a ClientPrintJob obj that will be processed at the client side by the WCPP
             $cpj = new ClientPrintJob();
             //set FGL commands to print...
             $cpj->printerCommands = $cmds;
             $cpj->formatHexValues = true;
             //$cpj->printFile = new PrintFile(Storage::path('SamplePngImage.png'),'SamplePngImage.png', null);
             
            //  $myfile = new PrintFileTXT(Storage::path('SampleText.txt'),'SampleText.txt', null);
            //  $myfile->printOrientation = PrintOrientation::Portrait;
            // // $myfile->printRotation = PrintRotation::Rot180;
            // //  $myfile->fontName = 'Arial';
            // //  $myfile->fontSizeInPoints = 12;
            // //  $myfile->textColor = '#ff00ff';
            // //  $myfile->textAlignment = TextAlignment::Center;
            // //  $myfile->fontBold = true;
            // //  $myfile->fontItalic = true;
            // //  $myfile->fontUnderline = true;
            // //  $myfile->fontStrikeThrough = true;
            //  $myfile->marginLeft = 0.01; // INCH Unit!!!
            //  $myfile->marginTop = 0.01; // INCH Unit!!!
            // //  $myfile->marginRight = 0.5; // INCH Unit!!!
            // //  $myfile->marginBottom = 0.5; // INCH Unit!!!
            //  $cpj->printFile = $myfile;


             if ($useDefaultPrinter || $printerName === 'null') {
                 $cpj->clientPrinter = new DefaultPrinter();
             } else {
                 $cpj->clientPrinter = new InstalledPrinter($printerName);
             }
         
             //Send ClientPrintJob back to the client
             return response($cpj->sendToClient())
                         ->header('Content-Type', 'application/octet-stream');
                 
             
         }
     }    
}
