<?php

namespace App\Http\Controllers;

use App\Model\Field;
use App\Model\Option;
use App\Model\Optionvalue;
use Illuminate\Http\Request;

class OptionvalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionvalues = Optionvalue::paginate(10);
        $fields = Field::all();

        return view('backend.optionvalues.index', compact('optionvalues', 'fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.optionvalues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Optionvalue::create($input);

        return back()->with('success', 'Option created successfully');
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
        $optionValue = Optionvalue::findOrFail($id);
        $fields = Field::all();

        // $optionvalueField = $optionValue->field;
        // dd($optionValue->field->name);

        return view('backend.optionvalues.edit', compact('optionValue', 'fields'));
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
        $input = $request->all();
        $optionvalue = Optionvalue::find($id);
        $optionvalue->update($input);

        return redirect()->route('optionvalues.index')->with('success', 'Option updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $optionvalue = Optionvalue::find($id);
        $optionvalue->delete();

        return response()->json(['success' => 'Record has been deleted!']);
    }
}
