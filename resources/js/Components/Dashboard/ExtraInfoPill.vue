<script setup lang="js">
defineProps({
    extraInfo: String
})
</script>

<template>
    <span class="bg-gray-300 text-gray-700 font-bold text-sm px-3 py-1 rounded-full">
        {{ extraInfo }}
    </span>
</template>