<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Mpdf\Mpdf; 

class PdfController extends Controller
{
    public function productos(){
        $products = Product::select("productos.codigo", "productos.nombre","productos.precio","marcas.nombre as marca_nombre")
      ->join("marcas", "marcas.codigo", "=", "productos.marca")
      ->get();

        $html = view('pdf.products', compact('products'))->render();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        return response(
            $mpdf->Output('', 'S'),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="productos.pdf"'
            ]
        );
    }
}
