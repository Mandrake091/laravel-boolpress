<template>
    <section>
        <h1 class="text-white text-center">Singolo post</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card mx-auto" v-if="post">
                        <img
                            :src="
                                `/storage/${post.image}` != '/storage/null'
                                    ? `/storage/${post.image}`
                                    : 'https://picsum.photos/500/250?random=' +
                                      post.id
                            "
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                            <small class="mr-3 text-white"
                                >Creato il: {{ formatDate }}</small
                            >
                            <h5 class="card-title">Titolo: {{ post.title }}</h5>
                            <p
                                class="card-text"
                                v-html="'Contenuto: ' + post.content"
                            ></p>

                            <div
                                class="list-group-item"
                                v-if="post.tags.length > 0"
                            >
                                <h4>Tags:</h4>
                                <p v-for="tag in post.tags" :key="tag.id">
                                    {{ tag.name }}
                                </p>
                            </div>
                            <div
                                class="list-group-item"
                                v-if="post.category != ''"
                            >
                                <h4>Categorie:</h4>
                                <p>
                                    {{ post.category.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-75 mx-auto mt-5">
                    <h1 class="text-center text-white">Commenta</h1>
                    <form @submit.prevent="addComment()">
                        <div class="text-center pb-5">
                            <label class="text-white" for="username"></label>
                            <input
                                v-model="formData.username"
                                type="text"
                                placeholder="Inserisci il nome"
                            />
                        </div>
                        <div class="mx-auto text-center">
                            <label class="w-100" for="content">
                                <textarea
                                    class="rounded border-3"
                                    v-model="formData.content"
                                    type="text"
                                    id="content"
                                    name="content"
                                    placeholder="Write something.."
                                    style="height: 200px"
                                ></textarea>
                            </label>
                            <!-- <input v-model="formData.content" type="text"/> -->
                            <button
                                class="btn btn-primary mx-auto"
                                type="submit"
                            >
                                Invia
                            </button>
                        </div>

                        <!-- <input v-model="formData.content" type="text"/> -->
                    </form>
                </div>
                <div class="col-12 pb-4">
                    <div v-if="post.comments.length > 0">
                        <div
                            v-for="comment in post.comments"
                            :key="comment.id"
                            class="comment mt-4 text-justify"
                        >
                            <img
                                :src="
                                    'https://picsum.photos/200/300?random=' +
                                    comment.id
                                "
                                alt=""
                                class="rounded-circle"
                                width="40"
                                height="40"
                            />
                            <p class="text-white">
                                Lì
                                <small>{{
                                    comment.created_at
                                        .substr(0, 19)
                                        .replace("T", ", ")
                                }}</small>
                            </p>
                            <h4 class="text-white">
                                {{ comment.username }}
                            </h4>

                            <br />
                            <p class="text-white">
                                {{ comment.content }}
                            </p>
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
                console.log(this.post);
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
    textarea {
        width: 100%;
        resize: none;
    }
    .comment:nth-child(odd) {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px;
        width: 55%;
    }
    .comment:nth-child(even) {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        float: right;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px;
        width: 55%;
    }
}
</style>
