
<x-layout>
    <x-slot name="content">

<div class="min-h-screen sm:items-center">
    <div class="relative  py-4  ">
        <div class="m-10 p-15 pt-10">
            <section class="p-50  m-10   bg-white  bg-opacity-50">
                <div class="flex justify-between items-center mb-4">
                    <h1>Projects</h1>
                    <a href="/admin/projects/create" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create Project</a>
                </div>
                @foreach ($projects as $project)
                <x-admin.project-row :project="$project" />
                @endforeach
            </section>

            <section class="p-50  m-10 bg-white bg-opacity-50">
                <div class="flex justify-between items-center mb-4">
                    <h1>Users</h1>
                    <a href="/admin/users/create" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create User</a>
                </div>
                @foreach ($users as $user)
                <x-admin.user-row :user="$user" />
                @endforeach
            </section>

            <section class="p-50  m-10 bg-white bg-opacity-50">
                <div class="flex justify-between items-center mb-4">
                    <h1>Categories</h1>
                    <a href="/admin/categories/create" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create Category</a>
                </div>
                @foreach ($categories as $category)
                <x-admin.category-row :category="$category" />
                @endforeach
            </section>

            <section class="p-50  m-10 bg-white bg-opacity-50">
                <div class="flex justify-between items-center mb-4">
                    <h1>Tags</h1>
                    <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Create Category</button>
                </div>
                @foreach ($tags as $tag)
                <x-admin.tag-row :tag="$tag" />
                @endforeach
            </section>


        </div>
    </div>
</div>
    </x-slot>
</x-layout>