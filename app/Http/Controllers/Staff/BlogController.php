<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('staff.blog.add', compact('blog'));
    }
    public function store(Request $request)
    {
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect('/data-blog')->with('success', 'Blog berhasil ditambahkan');;
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('staff.blog.edit', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        Blog::where('id', $id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                ]
            );
        return redirect('/data-blog')->with('success', 'Blog berhasil diubah');
    }
    public function destroy($id)
    {
        Blog::where('id', $id)->delete();
        return redirect()->back();
    }
}
