<script setup lang="js">
import { computed } from 'vue';
import ExtraInfoPill from './ExtraInfoPill.vue';
import SkillsPill from './SkillsPill.vue';
import {
    RiBriefcase4Line,
    RiMoneyRupeeCircleLine,
    RiMapPinLine,
    RiFileTextLine
} from '@remixicon/vue';

const props = defineProps({
    job: Object
})

const jobDescription = computed(() => {
    let minDescriptionLength = 163
    return (props.job.description.length > minDescriptionLength)
            ? props.job.description.substring(0, minDescriptionLength).concat('...')
            : props.job.description
})
</script>

<template>
    <div class="max-w-2xl mx-auto p-4 bg-white shadow rounded-lg">
        <div class="flex items-start justify-between">
            <div>
                <div class="flex space-x-2">
                    <img :src="job.company_logo" alt="Company Logo" class="rounded-full">
                    <span>
                        <h2 class="text-lg font-semibold">{{ job.title }}</h2>
                        <p class="text-gray-500">{{ job.company_name }}</p>
                    </span>
                </div>
            </div>
            <div class="flex space-x-2">
                <ExtraInfoPill
                    v-for="(extraInfo, index) in job.extra"
                    :key="index"
                    :extra-info="extraInfo"
                />
            </div>
        </div>

        <div class="flex items-center space-x-2 text-gray-500 text-sm mt-3">
            <span class="flex items-center">
                <RiBriefcase4Line size="15px" class-name="mr-2" /> {{ job.experience }}
            </span>
            <span>|</span>
            <span class="flex items-center">
                <RiMoneyRupeeCircleLine size="15px" class-name="mr-2" /> {{ job.salary }}
            </span>
            <span>|</span>
            <span class="flex items-center">
                <RiMapPinLine size="15px" class-name="mr-2" /> {{ job.location }}
            </span>
        </div>

        <p class="text-gray-500 mt-3 text-sm flex items-justify">
            <span><RiFileTextLine size="15px" class-name="mr-2" /></span>
            <span class="ml-1">{{ jobDescription }}</span>
        </p>

        <div class="flex items-center space-x-2 space-y-0 text-gray-600 text-xs">
            <SkillsPill
                v-for="(skill, index) in job.skills"
                :key="index"
                :index="index"
                :skill="skill"
                :total-skills="job.skills.length"
            />
        </div>

        <p class="text-gray-600 text-xs text-right" style="margin-top:-20px">2 minutes</p>
    </div>
</template>