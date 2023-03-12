<x-layout>
    <x-slot name="content">
      <main class="max-w-lg mx-auto min-h-screen sm:items-center">
        @if ($project)
            <h1 class="text-center font-bold text-xl mb-3">Edit Project: {{ $project->title }}</h1>
            <form method="POST" action="/admin/projects/{{ $project->id }}/edit" enctype="multipart/form-data">
            @method('PATCH')
        @else
            <h1 class="text-center font-bold text-xl mb-3">Create Project</h1>
            <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
        @endif
    @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required class="border border-gray-400 rounded p2 w-full">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
          <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
          
          <textarea name="excerpt" id="excerpt" required class="border border-gray-400 rounded p-2 w-full">{{ old('excerpt', $project ? $project->excerpt : '') }}</textarea>

          @error('excerpt')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
      </div>
      
        <div class="mb-6">
            <label for="body" class="block mb-2 font-bold text-xs text-gray-700">Body</label>
          <textarea name="body" id="body" required class="border border-gray-400 rounded p-2 w-full">{{ old('body', $project ? $project->body : '') }}</textarea>
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="url" class="block mb-2 font-bold text-xs text-gray-700">Url</label>
            <input type="url" name="url" id="url" value="{{ old('url') ?? $project?->url }}" class="border border-gray-400 rounded p2 w-full">
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="published_date" class="block mb-2 font-bold text-xs text-gray-700">Date</label>
            <input type="date" name="published_date" id="published_date" value="{{ old('published_date') ?? $project?->published_date }}" class="border border-gray-400 rounded p2 w-full">
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
            <input type="file" name="thumb" id="thumb"
            @if(!old('thumb') && $project) value="{{ old('thumb') ?? $project?->thumb }}"
              class="border border-gray-400 rounded p2 w-full">              @endif
              @if($project && $project->thumb)
              <img class="w-100px h-min justify-center" src="{{url('storage/' . $project->thumb )}}" />
              <input type="checkbox" name="delete_thumbnail" id="delete_thumbnail">
                <label for="delete_thumbnail">Delete thumbnail</label>
              @endif
            @error('thumb')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

        <div class="mb-6">
            <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="border border-gray-400 rounded p-2 w-full"
            @if(!old('image') && $project)
                value="{{ $project->image }}">
                @if($project->image)
                <img class="space-y-6 " src="{{url('storage/' . $project->image )}}" />
                <input type="checkbox" name="delete_image" id="delete_image">
                <label for="delete_image">Delete image</label>  
                @endif
            @endif
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

          <select name="category_id" id="category_id">
            <option value="" selected disabled>Select a Category</option>
            <option value="">None</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == old('category_id')) @elseif ($category->id == $project?->category_id) selected @endif>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
        <select name="tags[]" id="tags" multiple="multiple">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                @if (old('tags') && in_array($tag->id, old('tags')))
                        selected
                @elseif ($project && $project->tags)
                    @foreach ($project->tags as $projectTag)
                        @if ($tag->id == $projectTag->id)
                            selected
                        @endif
                    @endforeach
                @endif
                >
                {{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror


        <div class="mb-6">
            <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
        </div>
    </form>
</main>
</x-slot>
</x-layout>





