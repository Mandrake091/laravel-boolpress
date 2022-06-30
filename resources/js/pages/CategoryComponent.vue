<template>
<section>
  <h1>categoria</h1>
  <p>{{category.name}}</p>

</section>
  
</template>
<script>


export default {
  name: 'CategoryComponent',
  data(){
    return {
      category:null,
    }
  },
  mounted(){
    const slug = this.$route.params.slug;
        axios
            .get(`/api/categories/${slug}`)
            .then((response) => {
                this.category = response.data;
                
            })
            .catch((error) => {
                console.log(error);
                this.$router.push({ name: "page-404" });
            });
  }
 
}
</script>

<style>
</style>
