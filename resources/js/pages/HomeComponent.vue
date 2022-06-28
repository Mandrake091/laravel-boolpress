<template>
  <section class="text-white">
    <div class="container h-100">
      <div class="row h-100 justify-content-center">
            <h1 class="align-self-center">Benvenuto in questa pagina!</h1>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'HomeComponent'
}
</script>

<style lang="scss" scoped>
section{
  background-image: url('https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg');
  width: 100%;
  height: 100vh;
  background-size: cover;
  h1{
    filter: drop-shadow(1px 6px 5px black);
  }
}

</style>