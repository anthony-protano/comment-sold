<script setup>
import Navigation from '@/Components/Layout/Navigation.vue';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <Navigation />

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
