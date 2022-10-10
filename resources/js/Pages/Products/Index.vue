<script lang="ts" setup>
import PageHeader from "@/Components/UI/PageHeader.vue";
import { Table } from '@protonemedia/inertiajs-tables-laravel-query-builder';

const props = defineProps<{
    products: {},
}>();

const getSkus = (items: {}) => {
    if (!items) {
        return 'N/A';
    }

    const join = Object
        .values(items)
        .map((value) => value.sku).join(', ');

    return join !== '' ? join : 'N/A';
}

</script>

<template>
    <section>
        <PageHeader>
            <h1>Products</h1>
        </PageHeader>
    </section>

    <section class="container py-10">
        <Table :resource="products" striped>
            <template #cell(skus)="{ item }">
                {{ getSkus(item.inventory) }}
            </template>
        </Table>
    </section>
</template>
