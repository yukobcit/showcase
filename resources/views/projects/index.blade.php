
<x-layout>
    <x-slot name="content">

<div class="min-h-screen sm:items-center">
        @if (isset($categoryName))
            <a href="/projects" class="pl-10 text-gray-900 dark:text-white hover:underline" aria-current="page"> ← Back to Projects</a>
            <div class="md:text-center">
                <h1 class="text-3xl font-bold">{{ $categoryName }}</h1>
            </div>
        @endif
        @if (isset($tagName))
        <a href="/projects" class="pl-10 text-gray-900 dark:text-white hover:underline" aria-current="page"> ← Back to Projects</a>
        <div class="md:text-center">
            <h1 class="text-3xl font-bold">{{ $tagName }}</h1>
        </div>
    @endif
    <div class="relative flex justify-center  py-4 sm:pt-0">
        <div class="m-10 p-15">
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-2 p-50">
                @foreach ($projects as $project)
                <x-projects.project-card :project="$project" />
                @endforeach
            </section>
        @if (count($projects))
            <div class="text-xs mt-4 w-full text-right">{{ $projects->links() }}</div>
        @else
            <div>Nothing to showcase, yet.</div>
        @endif
        </div>
    </div>
</div>
    </x-slot>
</x-layout>