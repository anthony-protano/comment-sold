<script lang="ts" setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import PageHeader from "@/Components/UI/PageHeader.vue";
import { DataTable, TableHead, TableBody } from '@jobinsjp/vue3-datatable';

const table = computed(() => usePage().props.value.table);

const getSkus = (items) => {
    if (!items) {
        return 'N/A';
    }

    return Object
        .values(items)
        .map((value) => value.sku).join(', ');
}

</script>

<template>
    <section>
        <PageHeader>
            <h1>Products</h1>
        </PageHeader>
    </section>

    <section class="container py-10">
        <DataTable
            :rows="table"
            striped>
            <template #thead>
                <TableHead>
                    Product Name
                </TableHead>

                <TableHead>
                    Style
                </TableHead>

                <TableHead>
                    Product Type
                </TableHead>

                <TableHead>
                    Shipping Price
                </TableHead>

                <TableHead>
                    Skus
                </TableHead>
            </template>

            <template #tbody="{ row }">
                <TableBody v-text="row.product_name" />

                <TableBody v-text="row.style" />

                <TableBody v-text="row.product_type" />

                <TableBody>
                    ${{ row.human_shipping_price }}
                </TableBody>

                <TableBody>
                    {{ getSkus(row.inventory) }}
                </TableBody>
            </template>

            <template #empty>
                No records found.
            </template>
        </DataTable>
    </section>
</template>
