<template>
    <section v-if="posts.length > 0">
        <h1>Sono Posts component</h1>
        <div class="container">
            <div class="row justify-content-between">
                <div
                    v-for="(post, index) in posts"
                    :key="post.id"
                    class="card"
                    style="width: 18rem"
                >
                    <img
                        :src="`/storage/${post.image}`"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ index }} - {{ post.title }}
                        </h5>
                        <p class="card-text">
                            {{ post.content }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Category: {{ post.category_id }}
                        </li>
                    </ul>
                    <div class="card-body">
                        <router-link
                            :to="{
                                name: 'single-post',
                                params: { slug: post.slug },
                            }"
                        >
                            Visualizza Post
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "PostsComponent",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        axios.get("/api/posts").then((response) => {
            this.posts = response.data;
            console.log(this.posts);
        });
    },
};
</script>

<style lang="sass" scoped></style>
