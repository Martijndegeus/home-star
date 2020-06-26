<template>
    <div class="marquee">
        <p><span v-for="headline in headlines" v-bind="headline.index">{{ headline }} | </span>
        </p>
    </div>
</template>

<script>
    export default {
        name: "NewsTicker",
        props: ["headlines"]
    }
</script>

<style scoped>

</style>
