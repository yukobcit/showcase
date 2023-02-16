
<x-layout>
    <x-slot name="content">

<div class="min-h-screen sm:items-center">
    <div class="relative  py-4  ">
        <div class="m-10 p-15 pt-10">
            <section class="p-50  m-10   bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h1>Projects</h1>
                    <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create Project</button>
                </div>
                @foreach ($projects as $project)
                <x-admin.project-row :project="$project" />
                @endforeach
            </section>

            <section class="p-50  m-10 bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h1>Users</h1>
                    <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create User</button>
                </div>
                @foreach ($users as $user)
                <x-admin.user-row :user="$user" />
                @endforeach
            </section>

        </div>
    </div>
</div>
    </x-slot>
</x-layout>