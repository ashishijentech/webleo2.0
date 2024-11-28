<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\ComponentOption;

class ComponentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'elements' => 'required',
            'component_name' => 'required|string|max:255',
            'type' => 'required|string',
            'component_value' => 'nullable|string',
            'options' => 'nullable|array',
            'options.*' => 'nullable|string',
        ]);


        $component = new Component();
        $component->element_id = $request->input('elements');
        $component->name = $request->input('component_name');
        $component->type = $request->input('type');

        // If type is not 'select', save the value directly
        if ($request->input('type') !== 'select') {
            $component->value = $request->input('component_value');
        }
        $component->save();


        // If type is 'select', save the options
        if ($request->input('type') === 'select' && $request->has('options')) {
            foreach ($request->input('options') as $option) {
                $option = ComponentOption::create([
                    'name_id' => $component->id,
                    'option_value' => $option,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Component created successfully!');
    }

    public function list($element_id)
    {
        $component = Component::where('element_id', $element_id)->get();
        #dd($component);
        return view('superadmin.componetlist')->with(compact('component'));
    }
}
