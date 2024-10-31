<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//$pcs=Pc::paginate(2);
        $pcs = Pc::all();
        return view('pc.index',compact('pcs'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return view('pc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'pc_name' => 'required|max:255',
            'pc_author' => 'required|string',
            'pc_describe' => 'required|string|max:255',
            'pc_price' => 'required|numeric',
            'publication_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->format('Y-m-d'), // Kiểm tra ngày không vượt quá ngày hiện tại
            ],
        ]);
        $pc = Book::create($validatedData);
        return redirect('/pcs')->with('success', 'Luu thanh cong!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pc = Pc::findOrFail($id);
        return view('pc.edit',compact('pc'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'pc_name' =>'required|max:255',
            'pc_author' =>'required|string',
            'pc_describe' =>'required|string|max:255',
            'pc_price' =>'required|numeric',
            'publication_date' => [
               'required',
                'date',
                'before_or_equal:'. now()->format('Y-m-d'), // Kiểm tra ngày không vượt quá ngày hiện tại
            ],
        ]);
        $pc = Pc::findOrFail($id);
        $pc->update($validatedData);
        return redirect('/pcs')->with('success', 'Sua thanh cong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pc = Pc::findOrFail($id);
        $pc->delete();
        return redirect('/pcs')->with('success', 'Xoa thanh cong!');
    }
}
