import _ from 'lodash'

export default {
  data: function () {
    return {
      loading: false,
      redirectTo: '/',
      errors: []
    }
  },
  props: ['gqQuery', 'model', 'title'],
  validations: {},
  computed: {},
  methods: {
    checkValidation (key) {
      if (this.errors) {
        let validation = _.findKey(this.errors, 'validation')
        if (validation && this.errors[validation].validation[key]) {
          return false
        }
      }
      return true
    },
    submit () {
      this.errors = []
      this.$v.model.$touch()
      if (this.$v.model.$error) {
        this.$q.notify('Please review fields again.')
        return
      }
      this.$apollo.client = 'auth'
      this.loading = true
      this.$apollo
        .mutate({
          mutation: this.gqQuery,
          variables: this.model
        })
        .then(response => {
          this.loading = false
          this.$router.replace(this.redirectTo)
        }).catch(error => {
        this.loading = false
        this.errors = error.graphQLErrors
        this.$q.notify('Some good Error Message.')
      })
    }
  }
}
