<script lang="ts" setup>
import { Table } from '@protonemedia/inertiajs-tables-laravel-query-builder';
import PageHeader from '@/Components/UI/PageHeader.vue';

const props = defineProps<{
    inventory_total: number,
    inventory: {}
}>();
</script>

<template>
    <section>
        <PageHeader>
            <h1>
                Inventory -

                <small class="font-normal">
                    {{ inventory_total }} items
                </small>
            </h1>
        </PageHeader>
    </section>

    <section class="container py-10">
        <Table :resource="inventory" striped />
    </section>
</template>
