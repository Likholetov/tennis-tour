<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::simplePaginate(10);

        return view('post.index', compact('posts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('post.create');
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->validated());
        //$post = new Post();

        $content = $request->content;
        $dom = new \DomDocument("1.0", 'UTF-8');
        $dom->loadHtml('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        foreach ($dom->childNodes as $item){
            if ($item->nodeType == XML_PI_NODE)
                $dom->removeChild($item); // remove hack
                $dom->encoding = 'UTF-8'; // insert proper
        }
        
        //identify img element
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 source data (src) and save them to folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){

            //collect img source data
            $data = $img->getattribute('src');

            //checking if img source data is image by detecting 'data:image' in string
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            //decode base64
            $data = base64_decode($data);

            //naming image file
            $image_name= time().rand(000,999).$k.'.png';

            // image path (path) to use upload file to
            //$path = 'img/location/'. $image_name;

            //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
            //$path2 = '/img/location/'. $image_name;
            //$request->image->storeAs('images/posts/' . $post->id . '/img/', $image_name, 'public');

            //file_put_contents($path, $data);

            Storage::put('public/images/posts/' . $post->id . '/img/' . $image_name, $data);

            //modify image source data in summernote content before upload to DB
            $img->removeattribute('src');
            $img->setattribute('src', "/storage/images/posts/" . $post->id . "/img/" . $image_name);}

            else {
            // not base64 img

            }
        }
    
        $content = $dom->saveHTML();
        
        $post->img_url = "";
        $post->title = $request->title;
        $post->description =  $request->description;
        $post->content =  $content;
        $post->save();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/posts/' . $post->id, $filename, 'public');
            $post->update(['img_url' => "/storage/images/posts/" . $post->id . "/" . $filename]);
        }

        return redirect()->route('post.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $content = $request->content;
        $dom = new \DomDocument("1.0", 'UTF-8');
        $dom->loadHtml('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        foreach ($dom->childNodes as $item){
            if ($item->nodeType == XML_PI_NODE)
                $dom->removeChild($item); // remove hack
                $dom->encoding = 'UTF-8'; // insert proper
        }
        
        //identify img element
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 source data (src) and save them to folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){

            //collect img source data
            $data = $img->getattribute('src');

            //checking if img source data is image by detecting 'data:image' in string
            if (strpos($data, 'data:image')!==false){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            //decode base64
            $data = base64_decode($data);

            //naming image file
            $image_name= time().rand(000,999).$k.'.png';

            // image path (path) to use upload file to
            //$path = 'img/location/'. $image_name;

            //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
            //$path2 = '/img/location/'. $image_name;
            //$request->image->storeAs('images/posts/' . $post->id . '/img/', $image_name, 'public');

            //file_put_contents($path, $data);

            Storage::put('public/images/posts/' . $post->id . '/img/' . $image_name, $data);
            //modify image source data in summernote content before upload to DB
            $img->removeattribute('src');
            $img->setattribute('src', "/storage/images/posts/" . $post->id . "/img/" . $image_name);}

            else {
            // not base64 img

            }
        }
    
        $content = $dom->saveHTML();
        
        //$post->img_url = "";
        $post->title = $request->title;
        $post->description =  $request->description;
        $post->content =  $content;
        $post->save();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/posts/' . $post->id, $filename, 'public');
            $post->update(['img_url' => "/storage/images/posts/" . $post->id . "/" . $filename]);
        }

        return redirect()->route('post.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        if (Storage::exists('public/images/posts/' . $post->id)) {
            Storage::deleteDirectory('public/images/posts/' . $post->id);
        }
        return redirect()->route('post.index');
    }
}
