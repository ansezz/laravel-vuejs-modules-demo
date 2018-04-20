<template>
  <div>
    <form @submit.prevent="submit">
      <header>
        <h4>{{title}}</h4>
        <slot name="header"></slot>
      </header>
      <form-error :errors="errors"></form-error>
      <div>
        <q-input
          v-model="model.email"
          type="email"
          stack-label="Type your Email"
          :error="$v.model.email.$error"
        ></q-input>
        <q-input
          v-model="model.login"
          type="text"
          stack-label="Login"
          :error="$v.model.login.$error"
        ></q-input>
        <q-input
          v-model="model.password"
          type="password"
          float-label="Password"
          :error="$v.model.password.$error"
        ></q-input>
        <q-checkbox v-model="model.status" label="Status"></q-checkbox>
        <q-input
          v-model="model.name"
          type="text"
          stack-label="Name"
          :error="$v.model.name.$error"
        ></q-input>
        <q-input
          v-model="model.display_name"
          type="text"
          stack-label="Display name"
          :error="$v.model.display_name.$error"
        ></q-input>
        <q-input v-model="model.url" type="url" stack-label="Website"></q-input>
        <q-btn color="primary" label="create" type="submit"></q-btn>
      </div>
      <footer>
        <slot name="footer"></slot>
      </footer>

      <q-inner-loading :visible="loading">
        <q-spinner-mat size="50px" color="primary"></q-spinner-mat>
      </q-inner-loading>
    </form>
  </div>
</template>

<style>
</style>

<script>
  import {required, email, minLength} from 'vuelidate/lib/validators'
  import formMixins from 'mixins/form'
  import formError from 'components/formErrors'

  export default {
    name: 'form-user',
    mixins: [formMixins],
    components: {
      formError
    },
    validations: {
      model: {
        email: {
          required,
          email,
          unique: function () {
            return this.checkValidation('email')
          }
        },
        name: {required},
        password: {required, minLength: minLength(6)},
        login: {
          required,
          unique: function () {
            return this.checkValidation('login')
          }
        },
        display_name: {required}
      }
    },
    created () {
      this.redirectTo = '/admin/users'
    },
    methods: {}
  }
</script>
