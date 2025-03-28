<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        <div class="pt-8 grid grid-cols-3 gap-2 justify-evenly">
            {{-- Skills Table --}}
            <div class="col-span-2 rounded-lg h-12">
                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                        class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow w-full">
                    <h2 class="text-lg font-semibold mb-4">Job Details</h2>
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="title">Title</label>
                    <input
                        type="text"
                        id="title"
                        placeholder="Job posting title"
                        wire:model="title"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                    >

                    <label class="block text-gray-700 text-sm font-medium mb-2" for="description">Description</label>
                    <textarea
                        id="description"
                        placeholder="Job posting description"
                        wire:model="description"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                    ></textarea>

                    <div class="pt-8 grid grid-cols-2 gap-2 justify-evenly">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="experience">Experience</label>
                            <input
                                type="text"
                                id="experience"
                                placeholder="Eg. 1-3 Yrs"
                                wire:model="experience"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="salary">Salary</label>
                            <input
                                type="text"
                                id="salary"
                                placeholder="Eg. 2.75-5 Lacs PA"
                                wire:model="salary"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="location">Location</label>
                            <input
                                type="text"
                                id="location"
                                placeholder="Eg. Remote / Pune"
                                wire:model="location"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2" for="extra">Extra Info</label>
                            <input
                                type="text"
                                id="extra"
                                placeholder="Eg. Full Time, Urgent / Part Time, Flexible"
                                wire:model="extra"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                            >
                            <small class="text-gray-500">
                                Please use comma separated values
                            </small>
                        </div>
                    </div>

                    {{-- Save Button --}}
                    <button
                        type="submit"
                        class="w-1/12 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                    >
                        Save
                    </button>
                </div>
            </div>
            {{-- Skills Table End --}}
            {{-- Add Company Details Form --}}
            <div class="rounded-lg h-12">
                <div class="bg-white p-6 rounded-lg shadow w-full">
                    <h2 class="text-lg font-semibold mb-4">Company Details</h2>
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="skill">Name</label>
                    <input
                        type="text"
                        id="skill"
                        placeholder="Company name"
                        wire:model="name"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                    >

                    <label class="block text-gray-700 text-sm font-medium mb-2 mt-5" for="logo_upload">Logo</label>
                    <input
                        type="file"
                        id="logo_upload"
                        placeholder="Company name"
                        wire:model="photo"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                    >
                </div>

                <div class="bg-white p-6 rounded-lg shadow w-full mt-5">
                    <h2 class="text-lg font-semibold mb-4">Skills</h2>
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="skill">Name</label>
                    <select multiple class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        @foreach ($skills as $skill)
                            <option
                                wire:key="{{ $skill->id }}"
                                value="{{ $skill->id }}"
                            >
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
</div>
