<?php

namespace App\Http\Controllers;

use App\Model\Type;
use App\Model\Optionvalue;
use App\Model\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.options.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('backend.options.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'optionValueImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $input = $request;
        $option = new Option;
        $optionvalue = new Optionvalue;
        $option->name = $input->option_name;
        $option->type_id = $input->type_id;
        $option->save();

        $optionvalue->name = $input->option_value_name;
        $optionvalue->sort = $input->option_value_sort;

        if ($input->file('option_value_image')) {
            $imagePath = $input->file('option_value_image');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('option_value_image')->storeAs('uploads', $imageName, 'public');
        }

        $optionvalue->image = '/storage/'.$path;
        $optionvalue->save();

        return redirect()->route('options.index');
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
    }
}
