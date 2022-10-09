<script lang="ts" setup></script>

<template>
    <article class="p-6 bg-white rounded-md shadow-md">
        <header class="flex items-center pb-4 border-b border-b-gray-200">
            <slot name="title" />

            <div class="ml-auto">
                <slot name="right" />
            </div>
        </header>

        <div class="pt-4">
            <p class="font-medium">
                Total:
                <span class="font-bold">
                    <slot name="total" />
                </span>
            </p>
        </div>
    </article>
</template>
