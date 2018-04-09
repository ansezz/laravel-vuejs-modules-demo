// import something here
import {GRAPHQL_URL} from '../config/index'
import {ApolloClient} from 'apollo-client'
import {HttpLink} from 'apollo-link-http'
import {InMemoryCache} from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'
import {setContext} from 'apollo-link-context'

const httpLink = new HttpLink({
  // You should use an absolute URL here
  uri: GRAPHQL_URL
})

// get the authentication token from local storage if it exists
// const token = localStorage.getItem('authToken')
let token = localStorage.getItem('authToken')

/**
 * Helper method to set the header with the token
 */
export function setToken (newToken) {
  token = newToken
}

const authLink = setContext((_, {headers}) => {
  // return the headers to the context so httpLink can read them
  return {
    headers: {
      ...headers,
      authorization: token ? 'Bearer ' + token : null
    }
  }
})

// Create the apollo client
const apolloClient = new ApolloClient({
  link: authLink.concat(httpLink),
  cache: new InMemoryCache(),
  connectToDevTools: true
})

const apolloProvider = new VueApollo({
  defaultClient: apolloClient
})

// leave the export, even if you don't use it
export default ({app, router, Vue}) => {
  // Install the vue plugin
  Vue.use(VueApollo)
  app.provide = apolloProvider.provide()
}
