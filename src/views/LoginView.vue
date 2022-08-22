<template>
  <div class="login">
    <form></form>
    <div class="login-box">
      <h3>Login</h3>
      <div class="mt-3 form-floating mb-3">
        <input type="email" class="input-border form-control" id="floatingInput" placeholder="name@example.com"
        v-model="user.email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="mt-3 form-floating">
        <input type="password" class="input-border form-control" id="floatingPassword" placeholder="Password"
        v-model="user.password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="mt-4 btn btn-primary w-100"
      style="background: var(--color-background);
      border: solid 1px var(--color-background);"
      @click="logIn()">
        Iniciar Sesión
      </button>
    </div>
  </div>
</template>
<script>
import { mapMutations } from 'vuex'
export default {
  name: 'Login',
  data: function(){
    return {
      user: {
        email: 'cubillosa862@gmail.com',
        password: '123456'
      }
    }
  },
  methods: {
    logIn(){
      let user = {email: 'cubillosa862@gmail.com', password: '123456'}
      if(user.email == this.user.email &&
      user.password == this.user.password){
        this.setToken('RES_TOKEN');
        localStorage.setItem('token', 'RES_TOKEN');
        window.location.href = 'admin';
      } else {
        this.launchAlert({icon:'error', title: 'Correo o contraseña incorrectos'})
      }
    },
    launchAlert(config){
      if(!config.timeout) config.timeout = 2500;
      const Toast = this.$swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: config.timeout
      })
      Toast.fire({
        icon: config.icon,
        title: config.title
      })
    },
    ...mapMutations(['setToken'])
  },
}
</script>
<style>
body{
  background: var(--color-background);
}
.login{
  min-width: 100vw;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.login-box{
  background: #fff;
  border-radius: .5rem;
  padding: 2rem 1rem;
  min-width: 280px;
  box-shadow: 0 0 .8rem var(--color-primary);
}
.login-box{
  color: #6e6e6e
}
.input-border {
  border: none;
  border-radius: 0;
  border-bottom: 1px solid rgba(107, 107, 107, 0.4);
}

</style>