<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
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
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                <input
                                    type="checkbox"
                                    wire:model="allSelected"
                                    wire:click="updateAllSelected($event.target.checked)"
                                    class="mx-2 w-4 h-4 text-blue-600 border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 hover:scale-110 transition"
                                >
                                Name

                                <button
                                    x-show="$wire.selectedRows.length > 1"
                                    x-on:click="$wire.deletedSelectedRows()"
                                    class="text-sm px-3 py-1.5 ml-4 rounded hover:bg-slate-100 transition-colors text-red-500"
                                >
                                    Bulk Delete
                                </button>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                    <input
                                        type="checkbox"
                                        wire:model="selectedRows"
                                        value="{{ $skill->id }}"
                                        x-data="{ checked: @entangle('selectedRows') }"
                                        x-model="checked"
                                        x-on:click="$wire.allSelected = $wire.selectedRows.length === {{ count($skills) }}"
                                        class="mx-2 w-4 h-4 text-blue-600 border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 hover:scale-110 transition"
                                    >
                                    {{ $skill->name }}
                                </th>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button
                                        x-on:click="$wire.toggleEditFlag({{ $skill->id }})"
                                        class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-blue-500"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        x-on:click="$wire.delete({{ $skill->id }})"
                                        class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500"
                                    >
                                        Delete
                                    </button>
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
            {{-- Add Skills Form --}}
            <div class="rounded-lg h-12" x-show="!$wire.editFlag">
                <div class="bg-white p-6 rounded-lg shadow w-full">
                    <h2 class="text-lg font-semibold mb-4">Add new skill</h2>
                    <form wire:submit="save">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="skill">Name</label>
                        <input
                            type="text"
                            id="skill"
                            placeholder="Skill name"
                            wire:model="name"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                        >
                        <div>
                            @error('name')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Save Button --}}
                        <button
                            type="submit"
                            class="mt-4 w-1/6 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                        >
                            Save
                        </button>

                        {{-- Cancel Button --}}
                        <button
                            x-show="$wire.editFlag"
                            type="submit"
                            class="mt-4 w-1/6 bg-gray-300 text-gray py-2 rounded-md hover:bg-gray-500 hover:text-gray-100"
                        >
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
            {{-- Add Skills Form End --}}

            {{-- Update Skills Form --}}
            <div class="rounded-lg h-12" x-show="$wire.editFlag">
                <div class="bg-white p-6 rounded-lg shadow w-full">
                    <h2 class="text-lg font-semibold mb-4">Update skill</h2>
                    <form wire:submit="update">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="skill">Name</label>
                        <input
                            type="text"
                            id="skill"
                            placeholder="Skill name"
                            wire:model="name"
                            value="{{ $name }}"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-0 focus:ring-blue-500"
                        >
                        <div>
                            @error('name')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Save Button --}}
                        <button
                            type="submit"
                            class="mt-4 w-1/6 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                        >
                            Update
                        </button>

                        {{-- Cancel Button --}}
                        <button
                            x-show="$wire.editFlag"
                            type="submit"
                            class="mt-4 w-1/6 bg-gray-300 text-gray py-2 rounded-md hover:bg-gray-500 hover:text-gray-100"
                        >
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
            {{-- Update Skills Form End --}}
        </div>
    </div>
</div>
