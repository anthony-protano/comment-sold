<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import PageHeader from "@/Components/UI/PageHeader.vue";
import TotalWidget from "@/Components/Widgets/TotalWidget.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const products_total = computed(() => usePage().props.value.products_total);
const inventory_total = computed(() => usePage().props.value.inventory_total);

</script>

<template>
    <section>
        <PageHeader>
            <h1>Dashboard</h1>
        </PageHeader>
    </section>

    <section class="grid sm:grid-cols-2 container my-6 gap-6">
        <TotalWidget>
            <template #title>
                <h2>Products</h2>
            </template>

            <template #right>
                <PrimaryButton
                    :href="route('products.index')"
                    title="View products" link>
                    View Products
                </PrimaryButton>
            </template>

            <template #total>
                {{ products_total }}
            </template>
        </TotalWidget>

        <TotalWidget>
            <template #title>
                <h2>Inventory</h2>
            </template>

            <template #right>
                <PrimaryButton
                    :href="route('inventory.index')"
                    title="View products" link>
                    View Inventory
                </PrimaryButton>
            </template>

            <template #total>
                {{ inventory_total }}
            </template>
        </TotalWidget>
    </section>
</template>
