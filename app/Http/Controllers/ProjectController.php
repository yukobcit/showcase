<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null);
    }

    public function show(Project $project)
    {
            return view('projects.project',['project' => $project]);
    }
    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects()->paginate(6)->withQueryString())
        // ->with('projects', $category->projects)
        ->with('categoryName', $category->name);
    }

    public function listByTag(Tag $tag)
    {
        return view('projects.index')
        ->with('projects', $tag->projects()->paginate(6)->withQueryString())
        // ->with('projects', $category->projects)
        ->with('tagName', $tag->name);
    }

    public function create() {
        return view('admin.projects.create')
        ->with ('project', null)
        ->with ('tags', Tag::all())
        ->with('categories', Category::all());
    }
    public function store( Request $request) {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);
        // Generate the slug from the title
        $attributes['slug'] = Str::slug($attributes['title']);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $project = Project::create($attributes);


        $project->tags()->attach($request['tags']);
 

        session()-> flash('success', 'Project created');
        return redirect('/admin');
    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with ('tags', Tag::all())
        ->with('categories', Category::all());
    }

    public function update(Project $project, Request $request) {
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
    ]);

        // Save upload in public storage and set path attributes 

        if($request->file('image'))
        {
            $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
            $attributes['image'] = $image_path;
        }

        if($request->file('thumb'))
        {
            $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
            $attributes['thumb'] = $thumb_path;
        }


        $project->update($attributes);

        $project->tags()->sync($request['tags']);

        return redirect('/admin');
    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }
}