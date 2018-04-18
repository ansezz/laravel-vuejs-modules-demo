<template>
  <div>
    <form @submit.prevent="sendSubmit">
      <header>
        <slot name="header"></slot>
      </header>
      <div>
        <q-input
          v-model="user.email"
          type="email"
          stack-label="Type your Email"
          :error="$v.user.email.$error"
        ></q-input>
        <q-input
          v-model="user.login"
          type="text"
          stack-label="Login"
          :error="$v.user.login.$error"
        ></q-input>
        <q-input
          v-model="user.password"
          type="password"
          float-label="Password"
          :error="$v.user.password.$error"
        ></q-input>
        <q-checkbox v-model="user.status" label="Status"></q-checkbox>
        <q-input
          v-model="user.name"
          type="text"
          stack-label="Name"
          :error="$v.user.name.$error"
        ></q-input>
        <q-input
          v-model="user.display_name"
          type="text"
          stack-label="Display name"
          :error="$v.user.display_name.$error"
        ></q-input>
        <q-input v-model="user.url" type="url" stack-label="Website"></q-input>
        <q-btn color="primary" label="create" type="submit"></q-btn>
      </div>
      <footer>
        <slot name="footer"></slot>
      </footer>
    </form>
  </div>
</template>

<style>
</style>

<script>
  import {required, email, minLength} from 'vuelidate/lib/validators'

  export default {
    name: 'form-user',
    props: ['user', 'submit'],
    validations: {
      user: {
        email: {required, email},
        name: {required},
        password: {required, minLength: minLength(6)},
        login: {required},
        display_name: {required}
      }
    },
    methods: {
      sendSubmit () {
        this.$v.user.$touch()
        if (this.$v.user.$error) {
          this.$q.notify('Please review fields again.')
          return
        }
        this.submit()
      }
    }
  }
</script>
