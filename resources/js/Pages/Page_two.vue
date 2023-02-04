<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Page 2</h2>
        </template>
        <div class="page_two bg-slate-200">
            <h3>HELLOOO</h3>
        </div>
    </AuthenticatedLayout>
</template>