<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
//        \Alert::success('提交成功')->persistent("close");
        return view('items.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'photo' => 'required|image',
            'image' => 'required|image',
        ]);
        $item = Item::create([
            'title'         => $request->title,
            'name'          => $request->name,
            'age'           => $request->age,
            'school'        => $request->school,
            'birthday'      => $request->birthday,
            'class'         => $request->class,
            'teacher'       => $request->teacher,
            'teacher_phone' => $request->teacher_phone,
            'teacher_email' => $request->teacher_email,
            'parents'       => $request->parents,
            'parents_phone' => $request->parents_phone,
            'group'         => $request->group,
            'thought'       => $request->thought,
            'note'          => $request->note,
        ]);

        $this->saveImage($request->file('photo'), $item->id, 'avatar');
        $this->saveImage($request->file('image'), $item->id, 'image');

        session()->flash('alert', true);
        return back();
    }

    public function saveImage($file, $id, $type)
    {
        $ext = $file->extension();
        $file->storeAs("images/" . $id, $id . '_' . $type . '.' . $ext);
    }
}
