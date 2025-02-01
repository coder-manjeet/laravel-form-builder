<?php

namespace CoderManjeet\LaravelFormBuilder\Http\Controllers\API\Forms;

use CoderManjeet\LaravelFormBuilder\Http\Controllers\Controller;
use CoderManjeet\LaravelFormBuilder\Http\Resources\FormResource;
use CoderManjeet\LaravelFormBuilder\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {
        $form = Form::find($id);

        if (!$form) {
            return response()->json(['message' => 'Form not found'], 404);
        }
        $form = new FormResource($form);
        
        return response()->json($form, 200);
    }

    /**
     * Display the specified resource.
     */
    public function files(Request $request, int $id)
    {
        $form = Form::find($id);

        if (!$form) {
            return response()->json(['message' => 'Form not found'], 404);
        }

        $file_fields = $form->fileFields()->select('id', 'required', 'name', 'label')->get();
        
        return response()->json($file_fields, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = Form::find($id);

        if (!$form) {
            return response()->json(['message' => 'Form not found'], 404);
        }

        $form->delete();
        return response()->json(['message' => 'Form deleted successfully.'], 204);
    }
}
