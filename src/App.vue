<template>
  <div id="app">
    <router-view/>
  </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  methods: {
    ...mapActions(['readToken'])
  },
  mounted() {
    this.readToken();
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";
    window.onhashchange=function(){window.location.hash="no-back-button";}
  },
}
</script>
<style>
.form-floating>label{
    padding: 1rem .4rem;
}
</style>