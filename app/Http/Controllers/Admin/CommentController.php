<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::OrderBy('sort', 'asc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

         $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        }

        Comment::create($input);


        return redirect()->route('comments.index')
            ->with('success','Комментарий успешно создан.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
         request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required',
            'comment' => 'required',
        ]);

         $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";
        }else {
            unset($input['photo']);
        }

        $comment->update($input);


        return redirect()->route('comments.index')
            ->with('success','Комментарий успешно изменен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')
            ->with('success','Комментарий успешно удален.');
    }

    public function up($id)
    {
        $objUp = Comment::findOrFail($id);
        $objUp->decrement('sort');
        $objUp->save();

        $objDown = Comment::where('sort', $objUp->sort)->first();
        $objDown->increment('sort');
        $objDown->save();

        return redirect()->route('comments.index')
            ->with('success','Комментарий успешно изменен.');
    }

    public function down($id)
    {
        $objDown = Comment::findOrFail($id);
        $objDown->increment('sort');
        $objDown->save();

        $objUp = Comment::where('sort', $objDown->sort)->first();
        $objUp->decrement('sort');
        $objUp->save();

        return redirect()->route('comments.index')
            ->with('success','Комментарий успешно изменен.');
    }

}
