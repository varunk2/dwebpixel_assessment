<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import JobCard from '@/Components/Dashboard/JobCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    jobs: Object
});

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <div class="grid grid-cols-2 gap-1">
                    <JobCard
                        v-for="job in jobs"
                        :key="job.id"
                        :job="job"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
