

<div class="odd:bg-green-200">
    <article class="flex justify-between">
        <h2 class="">{!! $user->name !!}</h2>
        <div>
            <a href="/admin/projects/{{ $user->id }}/edit">Edit</a>
            <a href="/admin/projects/{{ $user->id }}/delete" class="text-red-500">Delete</a>
        </div>
    </article>
</div>


