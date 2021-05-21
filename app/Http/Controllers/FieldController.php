<?php

namespace App\Http\Controllers;

use App\Model\Form;
use App\Model\Type;
use App\Model\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::paginate(10);
        return view('backend.field.index', compact('fields'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $types = Type::all();
        $forms = Form::all();
        return view('backend.field.create', compact('types', 'forms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = $request->all();
        Field::create($field);
        return redirect()->route('fields.index')->with('success', 'Field created successfully');
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
        $field = Field::findOrFail($id);
        $forms = Form::all();
        $types = Type::all();

        return view('backend.field.edit', compact('field', 'forms', 'types'));
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
        $field = Field::findOrFail($id);
        $input = $request->all();
        $field->update($input);

        return redirect()->route('fields.index')->with('success', 'Field updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::find($id);
        $optionvalues = DB::table('optionvalues')->where('field_id', '=', $id)->get();

        if(!empty($optionvalues)) {
            foreach ($optionvalues as $optionvalue) {
                $optionvalue->field_id = null;
            }
        }

        $field->delete();
        return response()->json(['success' => 'Record has been deleted!']);
    }

}
