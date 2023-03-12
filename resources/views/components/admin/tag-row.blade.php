<div class="odd:bg-green-200 odd:bg-opacity-50">
    <article class="flex justify-between">
        <h2 class="">{!! $tag->name !!}</h2>
        <div>
            <a href="/admin/tags/{{ $tag->id }}/edit"><i class="fa-solid fa-pen-to-square"></i>Edit  </a>
            <form method="POST" action="/admin/tags/{{$tag->id}}/delete" class="inline">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-600"><i class="fa-solid fa-trash text-red-600"></i>Delete
                </button>
            </form>
        </div>
    </article>
</div>