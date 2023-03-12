
<div class="odd:bg-green-200 odd:bg-opacity-50">
    <article class="flex justify-between">
        <a href="/projects/{{ $project->slug }}">{!! $project->title !!}  <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        <div>
            <a href="/admin/projects/{{ $project->id }}/edit"><i class="fa-solid fa-pen-to-square"></i>Edit  </a>
            <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                @csrf
                @method('delete')
               <button type="submit" class="text-red-600"><i class="fa-solid fa-trash text-red-600"></i>Delete
                </button>
            </form>
        </div>
    </article>
</div>