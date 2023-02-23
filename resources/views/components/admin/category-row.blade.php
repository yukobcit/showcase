<div class="odd:bg-green-200 odd:bg-opacity-50">
    <article class="flex justify-between">
        <h2 class="">{!! $category->name !!}</h2>
        <div>
            <a href="/admin/categories/{{ $category->id }}/edit">Edit</a>
            <form method="POST" action="/admin/categories/{{$category->id}}/delete" class="inline">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-600">Delete
                </button>
            </form>
        </div>
    </article>
</div>