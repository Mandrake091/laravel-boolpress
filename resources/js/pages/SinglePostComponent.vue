<template>
    <section>
        <h1>sono il singolo post component</h1>
        <div v-if="post">
            <h1>{{ post.title }}</h1>
            <p>{{ post.content }}</p>
            <ul v-if="post.tags">
                <li v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</li>
                <img class="w-25" :src="`/storage/${post.image}`" alt="">
                {{post.image}}
            </ul>
        </div>
    </section>
</template>

<script>
export default {
    name: "SinglePostComponent",
    data() {
        return {
            post: null,
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
            console.log(this.post)
        });
    },
};
</script>

<style lang="scss" scoped></style>
