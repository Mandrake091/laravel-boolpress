<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <!-- <a class="navbar-brand" href="#">BoolPress</a> -->
            <router-link :to="{ name: menuItem[0].routeName }"> </router-link>
            <button
                class="navbar-toggler"
                type="button"
                aria-label="Toggle navigation"
                @click="openNavbar()"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarNav">
                <div class="navbar-nav" @click="closeNavbar()">
                    <router-link
                        v-for="(item, index) in menuItem"
                        :key="index"
                        :to="{ name: item.routeName }"
                        class="nav-link"
                    >
                        {{ item.label }}
                    </router-link>
                </div>
                <div>
                    <a class="text-dark" href="/admin">Area Riservata</a>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menuItem: [
                {
                    label: "Home",
                    routeName: "home",
                },
                {
                    label: "Posts",
                    routeName: "posts",
                },
                {
                    label: "Chi Siamo",
                    routeName: "about",
                },
                {
                    label: "Contact",
                    routeName: "contact",
                },
            ],
        };
    },
    methods: {
        openNavbar() {
            const navBar = document.getElementById("navbarNav");
            navBar.classList.toggle("show");
            if (navbarDropdownExpanded == "true") {
                navbarDropdownExpanded = "false";
            } else {
                navbarDropdownExpanded = "true";
            }
        },
        closeNavbar() {
            const navBar = document.getElementById("navbarNav");
            navBar.classList.remove("show");
        },
    },
};
</script>

<style lang="scss" scoped>
.navbar-collapse.show {
    height: 180px;
    transition: height 0.5s ease-in-out;
}
.navbar {
    opacity: 0.8;
}
.navbar-collapse {
    height: 30px;
    transition: height 0.5s cubic-bezier(0, 1, 0, 1);
    overflow: hidden;
}
@media screen and (max-width: 992px) {
    .navbar-collapse {
        height: 0px;
    }
    .navbar-collapse.show {
        height: 180px;
    }
}
@media screen and (min-width: 992px) {
    .navbar-collapse.show {
        height: 30px;
    }
}
</style>
