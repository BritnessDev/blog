<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;

class PDFController extends Controller
{
    //
    public function index() {
        $data["email"] = "nakaoakira.pop@gmail.com";
        $data["title"] = "From nakao";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView("emails.myTestMail", $data);
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf){
            $message->to($data["email"], $data["email"])
            ->subject($data["title"])
            ->attachData($pdf->output(), "text.pdf");
        });

        dd("Mail sent successsfully");
    }
}
