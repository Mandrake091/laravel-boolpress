<template>
    <section>
        <h1 class="text-white text-center">Singolo post</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto py-5">
                    <div class="card mx-auto" style="width: 25rem">
                        <img
                            :src="`/storage/${post.image}`"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text">
                                {{ post.content }}
                            </p>
                        </div>
                        <ul
                            class="list-group list-group-flush"
                            v-if="post.tags"
                        >
                            <li
                                class="list-group-item"
                                v-for="tag in post.tags"
                                :key="tag.id"
                            >
                                {{ tag.name }}
                            </li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
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
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
            console.log(this.post);
        });
    },
};
</script>

<style lang="scss" scoped>
section{
  background-image: url('https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg');
  width: 100%;
  height: 100%;
  background-size: cover;
  h1{
    filter: drop-shadow(1px 6px 5px black);
  }
}
</style>

