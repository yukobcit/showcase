<div class="odd:bg-green-200">
    <article class="flex justify-between">
        <h2 class="">{!! $project->title !!}</h2>
        <div>
            <a href="/admin/projects/{{ $project->slug }}/edit">Edit</a>
            <a href="/admin/projects/{{ $project->slug }}/delete" class="text-red-500">Delete</a>
        </div>
    </article>
</div>