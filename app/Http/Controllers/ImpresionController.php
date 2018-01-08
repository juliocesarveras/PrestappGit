<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vsmoraes\Pdf\Pdf;

class ImpresionController extends Controller
{
    private $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function index()
    {
        $html = view('prestamos.reporte_show')->render();

        return $this->pdf
            ->load($html)
            ->show();
    }
}
