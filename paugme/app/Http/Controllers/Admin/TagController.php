<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagCreateRequest;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index')
            ->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Tag::fields();

        $data = [];

        foreach($fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.tag.create')->withTag($fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        $tag = new Tag();
        $fields = Tag::fields();

        foreach ( array_keys($fields) as $field ) {
            $tag->$field = $request->get($field);
        }

        $tag->save();
        return redirect('/admin/tag')->withSuccess("The tag '$tag->tag' was created.");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];
        $fields = Tag::fields();

        foreach( array_keys( $fields ) as $field ) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.tag.edit')->withTag( $data );
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
        $tag = Tag::findOrFail($id);
        $fields = Tag::fields();

        foreach ( array_keys( $fields ) as $field ) {
            $tag->$field = $request->get($field);
        }

        $tag->save();

        return redirect('/admin/tag/' . $id . '/edit')->withSuccess('Changes saved.');
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tag.delete')->withTag($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect('/admin/tag')->withSuccess("The tag '$tag->tag' was deleted.");
    }
}
