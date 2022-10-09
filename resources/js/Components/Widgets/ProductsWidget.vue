<script lang="ts" setup>
import { ref } from 'vue';
import axios from "axios";

const products = ref({});


const getProducts = async () => {
    try {
        const response = await axios.get('products', {
            params: {
                count: 10,
            }
        });

        console.log(response);
    } catch {

    }
};

</script>

<template>

</template>
