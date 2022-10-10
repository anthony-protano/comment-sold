<script lang="ts" setup>
import { Link } from "@inertiajs/inertia-vue3";

interface Props {
    type?: string,
    link?: boolean,
    href?: string,
    title?: string,
}

const props = withDefaults(defineProps<Props>(), {
    type: 'submit',
    link: false,
});

const buttonClass = 'inline-flex items-center px-4 py-2 bg-gray-800 ' +
    'border border-transparent rounded-md font-semibold text-xs ' +
    'text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 ' +
    'focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 ' +
    'disabled:opacity-25 transition';

</script>

<template>
    <button
        :type="type"
        :class="buttonClass"
        v-if="!link"
    >
        <slot />
    </button>

    <Link :href="href" :title="title" :class="buttonClass">
        <slot />
    </Link>
</template>
