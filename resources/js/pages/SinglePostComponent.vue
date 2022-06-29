<template>
    <section>
        <h1 class="text-white text-center">Singolo post</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto py-5">
                    <div class="card mx-auto" style="width: 25rem" v-if="post">
                        <img
                           :src="`/storage/${post.image}`!= '/storage/null' ? `/storage/${post.image}` : 'https://picsum.photos/500/250?random='+index"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                             <small class="mr-3">Creato il: {{ formatDate }}</small>
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text" v-html="post.content"></p>
                        </div>
                        <div class="list-group-item" v-if="post.tags.length > 0">
                            <h4>Tags:</h4>
                            <p v-for="tag in post.tags" :key="tag.id">
                                {{ tag.name }}
                            </p>
                        </div>
                        <div class="list-group-item" v-if="post.category != ''">
                            <h4>Categorie:</h4>
                            <p>
                                {{ post.category.name }}
                            </p>
                        </div>
                       
                        <div>
                            <form @submit.prevent="addComment()">
                                <label for="username">Inserisci il nome</label>
                                <input
                                    v-model="formData.username"
                                    type="text"
                                />
                                <label for="content"
                                    >Inserisci il contenuto</label
                                >
                                <input v-model="formData.content" type="text" />
                                <button type="submit">Invia</button>
                            </form>
                        </div>

                        <div v-if="post.comments.length > 0">
                            <h4>Commenti:</h4>
                            <div
                                v-for="comment in post.comments"
                                :key="comment.id"
                            >
                                <p>
                                    <strong>{{ comment.username }}</strong>
                                </p>
                                <p>{{ comment.content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "SinglePostComponent",
    data() {
        return {
            post: null,
            formData: {
                username: "",
                content: "",
                post_id: "",
            },
        };
    },
    methods: {
        addComment() {
            axios
                .post("/api/comments", this.formData)
                .then((response) => {
                    this.post.comments.push(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios
            .get(`/api/posts/${slug}`)
            .then((response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
                console.log(this.post)
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
    computed: {
        formatDate() {
            return this.post.created_at.substr(0, 19).replace("T", ", ");
        },
    },
};
</script>

<style lang="scss" scoped>
section {
    background-image: url("https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg");
    width: 100%;
    height: 100%;
    background-size: cover;
    h1 {
        filter: drop-shadow(1px 6px 5px black);
    }
}
</style>
