@props(['project'])

@props(['project', 'showBody' => false])

<div class="p-6 m-3 bg-opacity-50 bg-white overflow-hidden  shadow sm:rounded-lg flex flex-col ">
    <div class="text-xl font-bold break-all flex grow pb-3">
    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
    </div>
    @if ($showBody)
        <img src="{{url('storage/' . $project->image )}}" />

        <div class="space-y-6 ">{!! $project->body !!}</div>
    @else
    <div class="main grow flex gap-5 y-10">
        @if($project->thumb)
        <img src="{{url('storage/' . $project->thumb )}}" />
        @else
        <img class="w-12 justify-center" src="{{url('storage/images/130x130.png')}}" />
        @endif
        <div class="content grow col-start-2 row-start-2 col-span-2">{!! $project->excerpt!!}</div>
    </div>
    @endif

    <div class="footer grow flex gap-5 y-10">

    @if ($project->category)
    <a href="/projects/categories/{{ $project->category->slug }}" class="row-start-3 col-span-3 pt-3"><span>Category: {{ $project->category->name }}</span></a>
    @endif

    <div class="content grow col-start-2 row-start-2 col-span-2">
        @if($project->tags)
        @foreach ($project->tags as $tag)
        <!-- <a href = "/projects/tags/{{$tag->slug}}">{{$tag->name}}"> -->
        {{ $tag->name}} 
        @endforeach
        @endif
    </div>

</div>

</div>


