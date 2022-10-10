<script setup>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import PageHeader from "@/Components/UI/PageHeader.vue";

defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});
</script>

<template>
    <PageHeader>
        <h1>Api Tokens</h1>
    </PageHeader>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <ApiTokenManager
                :tokens="tokens"
                :available-permissions="availablePermissions"
                :default-permissions="defaultPermissions"
            />
        </div>
    </div>
</template>
