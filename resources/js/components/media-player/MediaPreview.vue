<template>
    <div>
        <div
            v-if="mediaInfo !== null && mediaInfo.attributes.entity_picture !== null"
            class="media-image">
            <img :src="mediaInfo.attributes.entity_picture"/>
        </div>
        <p class="media-app">{{ mediaInfo.attributes.app_name }}</p>
    </div>
</template>

<script>
    export default {
        name: "MediaPreview",
        props: ["mediaInfo"]
    }
</script>

<style scoped>

</style>
