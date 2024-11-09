<template>
    <div>
        <carousel />
    <div class="container-lg">
        <Products />
    </div>
    </div>
</template>

<script>
import Carousel from '@/components/carousel.vue';
import Products from '@/components/products.vue';

export default {
    name: 'Home',
    components: {
        Carousel,
        Products,
    },
};
</script>