<?php

namespace App\Http\Controllers;

use App\Board;
use App\Commerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($commerceSlug)
    {
        //
        $commerce = Commerce::findBySlug($commerceSlug);
        $boards = Board::all()->where('commerce_id',$commerce->id);
        // dd($boards);
        return view('commerce.board.index')->with('boards',$boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $commerceSlug)
    {
        // dd($request, $commerceSlug);
        $commerce = Commerce::findBySlug($commerceSlug);
        $n = (int)$request->boards;
        // dd($commerce,$n);
        for($i = 1; $i <= $n; $i++){
            $board = New Board();
            $board->commerce_id = $commerce->id;
            // $board->save();
            $board->identificable = ' ';
            $board->codeQR = 'asdas';
            $board->save();
            $nIndentificador = $board->id * rand(2,563453745);
            // dd($board->id, $nIndentificador);
            $board->identificable = $commerce->slug .'-'.$nIndentificador;
            $board->save();

            //Generacion de QR
            //Generacion de QR
            //Generacion de QR
            $image = \QrCode::format('png')
                             ->size(500)->errorCorrection('H')
                             ->generate($board->slug);
            $output_file = 'img/boardQR/qrBoad-'. $board->identificable .'-'.time() . '.png';
            Storage::disk('public')->put($output_file, $image);
            $board->codeQR = $output_file;
            $board->save();            
        }
        flash('Se han añadido '. $n . ' mesas a tu negocio')->success();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //
    }

    public function pdfPrint($commerceSlug){
        $commerce = Commerce::findBySlug($commerceSlug);
        $boards = Board::all()->where('commerce_id',$commerce->id)->toArray();
        $arrayCommerce = $commerce->toArray();
        // dd($boards,$arrayCommerce);
        $data = compact('salesorder', 'detailemployee', 'detailservice');
        // dd($commerce);
        $pdf = PDF::loadView('commerce.board.pdfTemplate',compact('boards'),compact('arrayCommerce'));
        return $pdf->stream($commerce->slug.'_mesas.pdf');
    }
}
