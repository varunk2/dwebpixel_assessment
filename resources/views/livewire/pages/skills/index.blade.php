<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        <div class="pt-8 grid grid-cols-3 gap-2 justify-evenly">
            {{-- Skills Table --}}
            <div class="col-span-2 rounded-lg h-12">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{ $skill }}</th>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <a href="#" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-blue-500">Edit</a>
                                    <a href="#" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b dark:border-gray-700">
                                <td
                                    colspan="2"
                                    scope="row"
                                    class="text-center px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    No skills found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Skills Table End --}}
            {{-- Skills Form --}}
            <div class="rounded-lg h-12">
                <div class="bg-white p-6 rounded-lg shadow w-full">
                    <h2 class="text-lg font-semibold mb-4">Add new skill</h2>
                    <form>
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="skill">Name</label>
                        <input
                            type="text"
                            id="skill"
                            placeholder="Skill name"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                        >
                        <button
                            type="submit"
                            class="mt-4 w-1/6 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                        >
                            Save
                        </button>
                    </form>
                </div>
            </div>
            {{-- Skills Form End --}}
        </div>
    </div>
</div>
