<template>
  <q-page padding class="justify-center">
    <q-card color="grey-2" class="text-dark relative-position">
      <q-card-main>
        <transition
          appear
          enter="fadeIn"
          leave="fadeOut"
        >
          <formUser :user="user" :submit="submit">
            <template slot="header">
              <q-card-title>
                <h4>{{$t('users.addNewUser')}}</h4>
              </q-card-title>
            </template>
          </formUser>
        </transition>
      </q-card-main>

      <!--
        Place QInnerLoading as the last child element.
        This is important for it to be displayed on top of the other content.
      -->
      <q-inner-loading :visible="loading">
        <q-spinner-mat size="50px" color="primary"></q-spinner-mat>
      </q-inner-loading>
    </q-card>
  </q-page>
</template>

<style>
</style>

<script>
  import formUser from './form'
  import createUserQuery from './../queries/createUser'

  export default {
    name: 'PageIndex-user',
    data: function () {
      return {
        loading: false,
        user: {
          login: '',
          email: '',
          name: '',
          display_name: '',
          url: 'http://',
          status: true
        }
      }
    },
    components: {
      formUser
    },
    methods: {
      submit () {
        this.$apollo.client = 'auth'
        this.loading = true
        this.$apollo
          .mutate({
            mutation: createUserQuery,
            variables: this.user
          })
          .then(response => {
            this.$router.replace('/admin/users')
            this.loading = false
          }).catch(error => {
          this.loading = false
          console.log(error)
        })
      }
    }
  }
</script>
