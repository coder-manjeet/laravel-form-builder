<?php

namespace CoderManjeet\LaravelFormBuilder\Http\Controllers\API\Forms;

use CoderManjeet\LaravelFormBuilder\Http\Controllers\Controller;
use CoderManjeet\LaravelFormBuilder\Http\Resources\FormFieldResource;
use CoderManjeet\LaravelFormBuilder\Models\Form;
use CoderManjeet\LaravelFormBuilder\Models\FormField;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FormField::latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $form_id)
    {
        $form = Form::find($form_id);

        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $request->validate([
            'name' => ['required','string','max:255'],
            'label' => ['required','string','max:255'],
            'type' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'options' => ['nullable', 'array'],
            'settings' => ['nullable','string'],
            'required' => ['nullable','boolean'],
            'placeholder' => ['nullable', 'string', 'max:255'],
            'default_value' => ['nullable','string','max:255'],
        ]);

        $formField = $form->fields()->create($request->all());

        // if ($request->has('options')) {
        //     $formField->options()->createMany($request->get('options'));
        // }

        return response()->json([
           'message' => 'Form field created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $form_id, string $field_id)
    {
        $form = Form::find($form_id);
        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $field = $form->fields()->find($field_id);

        if (!$field) {
            return response()->json(['error' => 'Form field not found'], 404);
        }

        $fieldsResource = new FormFieldResource($field);

        return response()->json($fieldsResource, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $form_id, string $field_id)
    {
        $form = Form::find($form_id);
        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $formField = $form->fields()->find($field_id);

        if (!$formField) {
            return response()->json(['error' => 'Form field not found'], 404);
        }

        $request->validate([
            'name' => ['required','string','max:255'],
            'label' => ['required','string','max:255'],
            'type' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'options' => ['nullable', 'array'],
            'options.*.label' => ['required', 'string', 'max:255'],
            'options.*.value' => ['required', 'string', 'max:255'],
            'settings' => ['nullable','string'],
            'required' => ['nullable','boolean'],
            'placeholder' => ['nullable','string','max:255'],
            'default_value' => ['nullable','string','max:255'],
        ]);
        
        $formField->update($request->all());

        // update or create field options from request
        if ($request->has('options')) {
            $formField->options()->delete();
            $formField->options()->createMany($request->get('options'));
        } else {
            $formField->options()->delete();
        }

        return response()->json([
           'message' => 'Form field updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $form_id)
    {
        $field = FormField::find($form_id);

        if (!$field) {
            return response()->json(['error' => 'Form field not found'], 404);
        }

        $field->delete();

        return response()->json([
           'message' => 'Form field deleted successfully',
        ], 200);
    }

    public function toggleRequired(Request $request, string $form_id, string $field_id) {
        $form = Form::find($form_id);
        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $field = $form->fields()->find($field_id);
        if (!$field) {
            return response()->json(['error' => 'Form field not found'], 404);
        }

        $validated = $request->validate([
            'required' => ['required', 'boolean'],
        ]);

        $field->update([
           'required' => $validated['required'],
        ]);

        $message = $validated['required'] ? 'Field is set to required' : 'Field is set to not required';

        return response()->json([
           'message' => $message,
        ], 200);
    }
}
