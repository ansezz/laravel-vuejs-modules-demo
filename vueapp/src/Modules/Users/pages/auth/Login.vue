<template>
  <section>
    <q-page-container>
      <q-page>
        <h4>login</h4>
        <form @submit="login">
          <q-input v-model="email" type="email" stack-label="Type your Email"></q-input>
          <q-input v-model="password" type="password" float-label="Password"></q-input>
          <q-checkbox v-model="keep" label="keep"></q-checkbox>
          <q-btn color="primary" label="Login" @click.prevent="login"></q-btn>
        </form>
      </q-page>
    </q-page-container>
  </section>
</template>

<style>
</style>

<script>
  import loginQuery from './../../queries/login'
  import {mapActions} from 'vuex'

  export default {
    name: 'PageIndex-user',
    data () {
      return {
        token: {},
        email: '',
        password: '',
        keep: false
      }
    },
    mounted () {
    },
    methods: {
      login () {
        this.$apollo
          .mutate({
            mutation: loginQuery,
            variables: {
              email: this.email,
              password: this.password
            }
          })
          .then(response => {
            this.setLogged(true)
            localStorage.setItem('auth-token', response.data.loginUser)
            this.$router.replace('/admin/users')
          })
      },
      ...mapActions('users', [
        'setLogged'
      ])
    }
  }
</script>
