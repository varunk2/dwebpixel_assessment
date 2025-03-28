<script setup lang="js">
defineProps({
    skill: String,
    index: Number,
    totalSkills: Number
})
</script>

<template>
    <span>{{ skill }}</span>
    <span
        v-if="index !== totalSkills-1"
        class="text-gray-400 text-4xl"
    >
        &#8226;
    </span>
</template>