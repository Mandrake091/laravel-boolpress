<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Doctrine\DBAL\Tools\Dumper;
use Facade\Ignition\DumpRecorder\Dump;
use Psy\VarDumper\Dumper as VarDumperDumper;
use Symfony\Component\Console\Helper\Dumper as HelperDumper;

class TagController extends Controller
{
        protected $validationRule = [
        'name'=>'required|string|max:100',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(12);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $tag = Tag::findOrFail($id);
      
        return view('admin.tags.show', compact('tag'));
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
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
      $request->validate($this->validationRule);
        $data = $request->all();
        
        if($tag->name != $data['name']){
            $tag->name = $data['name'];
            $slug = Str::of($tag->name)->slug('-');
            if($slug != $tag->slug){
                $tag->slug = $this->getSlug($tag->name);
            }
        }
     
        $tag->update();
        return redirect()->route('admin.tags.show', $tag->id);
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
    private function getSlug($name){
        $slug = Str::of($name)->slug('-');
        $count = 1;
        while( Tag::where('slug', $slug)->first() ){
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}