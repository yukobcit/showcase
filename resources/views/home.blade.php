<x-layout>
    <x-slot name="content">
        <div class="items-center justify-center min-h-screen py-4 sm:pt-0">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">

                <div class="max-w-4xl mx-auto space-y-6 text-center">
                    <h1 class="text-4xl text-gray-500">Welcome to showcase!</h1>
                    <h1 class="text-4xl text-gray-500">Featured Project</h1>
                    <h2 class="text-3xl font-extrabold text-gray-900">{{ $project->title }}</h2>
                    @if($project->image)
                    <img class="mx-auto h-96 rounded-lg" src="{{url('storage/' . $project->image )}}" />
                    @else
                    <img class="mx-auto w-100px h-min justify-center rounded-lg" src="{{url('storage/images/800x300.png')}}" />
                    @endif
                    <div class="text-lg leading-6 font-medium text-gray-900 bg-white bg-opacity-30" >{!! $project->excerpt !!}</div>


                    <br>
                    <br>
                            
                        <a href="/projects" class="font-bold text-lg ml-10">View all the Projects  <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        <div class="text-left">
                        @foreach ($sub_projects as $project)
                        <x-projects.project-card :project="$project" />
                        @endforeach
                        </div>
                </div>


            </div>


        </div>
    </x-slot>
</x-layout>
