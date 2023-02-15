<x-layout>
    <x-slot name="content">
        <a href="/projects" class="pl-10 text-gray-900 dark:text-white hover:underline" aria-current="page"> ← Back to Projects</a>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <x-projects.project-card :project="$project" :showBody="true"/>
        </div>
    </x-slot>
</x-layout>