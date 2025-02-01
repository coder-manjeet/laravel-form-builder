<?php

namespace CoderManjeet\LaravelFormBuilder\Http\Controllers\API\Forms;

use CoderManjeet\LaravelFormBuilder\Http\Controllers\Controller;
use CoderManjeet\LaravelFormBuilder\Models\FieldOption;
use CoderManjeet\LaravelFormBuilder\Models\FormField;
use Illuminate\Http\Request;

class FieldOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FieldOption::latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'field_id' =>'required|exists:fields,id',
            'label' =>'required|string|max:255',
        ]);

        $field = FormField::find($request->field_id);

        if(!$field) {
            return response()->json('Field not found', 404);
        }

        $field->options()->create($request->all());

        
        return response()->json([
           'message' => 'Option created successfully',
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = FieldOption::find($id);

        if (!$option) {
            return response()->json('Option not found', 404);
        }

        return response()->json($option, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'field_id' => 'exists:fields,id',
            'name' =>'required|string|max:255',
            'value' =>'required|string|max:255',
        ]);

        $field = FormField::find($request->request->get('field_id'));

        if (!$field) {
            return response()->json('Field not found', 404);
        }

        $fieldOption = $field->options()->find($id);
        if (!$fieldOption) {
            return response()->json('Option not found', 404);
        }

        $fieldOption->update($request->all());

        return response()->json([
           'message' => 'Option updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = FieldOption::find($id);
        if ($option) {
            $option->delete();
        } else {
            return response()->json('Option not found', 404);
        }

        return response()->json(null, 204);
    }
}
