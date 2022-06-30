<template>
    <section class="text-white">
        <div class="container h-100">
            <div class="row h-100 justify-content-center">
                <div class="col-3">
                    <h4>ciao</h4>
                    <ul>
                        <li
                            v-for="(category, index) in categories"
                            :key="index"
                        >
                            <router-link
                                :to="{
                                    name: 'category',
                                    params: { slug: category.slug },
                                }"
                                >{{ category.name }}</router-link
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    <div
                        id="carouselExampleControls"
                        class="carousel slide"
                        data-ride="carousel"
                    >
                        <div class="carousel-inner">
                            <div
                                class="carousel-item active"
                                v-for="(post, index) in posts"
                                :key="index"
                            >
                                <img
                                    class="d-block img-fluid"
                                    :src="`/storage/${post.image}`"
                                    alt="First slide"
                                />
                            </div>
                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleControls"
                            role="button"
                            data-slide="prev"
                        >
                            <span
                                class="carousel-control-prev-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleControls"
                            role="button"
                            data-slide="next"
                        >
                            <span
                                class="carousel-control-next-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "HomeComponent",
    data() {
        return {
            categories: [],
            posts: [],
        };
    },
    mounted() {
        axios
            .get("/api/categories/")
            .then((res) => {
                this.categories = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
        axios.get("/api/posts/").then((res) => {
            this.posts = res.data.slice(0, 3);
            console.log(this.posts);
        });
    },
};
</script>

<style lang="scss" scoped>
section {
    background-image: url("https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg");
    width: 100%;
    height: 100vh;
    background-size: cover;
    h1 {
        filter: drop-shadow(1px 6px 5px black);
    }
}

</style>
