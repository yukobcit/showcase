<div class="odd:bg-green-200 odd:bg-opacity-50">
    <article class="flex justify-between">
 
        <h2 class="">{!! $user->name !!}</h2>
        <div>
            <a href="/admin/users/{{ $user->id }}/edit">Edit</a>
            <form method="POST" action="/admin/users/{{$user->id}}/delete" class="inline">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-600">Delete
                </button>
            </form>
        </div>
    </article>
</div>