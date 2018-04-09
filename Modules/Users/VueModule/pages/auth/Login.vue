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
      console.log(this.$apollo)
    },
    methods: {
      login () {
        this.$apollo.queries.token.refresh()
      }
    },
    apollo: {
      token: {
        query: loginQuery,
        manual: true,
        variables () {
          return {
            email: this.email,
            password: this.password
          }
        },
        result ({data, loader, networkStatus}) {
          console.log(data)
          localStorage.setItem('authToken', data.login)
          console.log('We got some result!')
        }
      }
    }
  }
</script>
