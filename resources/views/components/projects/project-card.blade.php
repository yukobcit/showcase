@props(['project'])

@props(['project', 'showBody' => false])

<div class="p-6 m-3 bg-white overflow-hidden shadow sm:rounded-lg">
    <div class="text-xl font-bold break-all">
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </div>
    <div>{!! $project->excerpt!!}</div>
    @if ($showBody)
        <div class="space-y-6">{!! $project->body !!}</div>
    @endif
    @if ($project->category)
    <a href="/categories/{{ $project->category->slug }}"><span>Category: {{ $project->category->name }}</span></a>
    @endif
</div>


