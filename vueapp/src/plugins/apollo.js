// import something here
import {GRAPHQL_URL, AUTH_TOKEN, GRAPHQL_AUTH_URL} from '../config/index'
import {ApolloClient} from 'apollo-client'
import {HttpLink} from 'apollo-link-http'
import {ApolloLink, concat} from 'apollo-link'
import {InMemoryCache} from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'

const httpLink = new HttpLink({
  uri: GRAPHQL_URL
})
const httpAuthLink = new HttpLink({
  uri: GRAPHQL_AUTH_URL
})
const authMiddleware = new ApolloLink((operation, forward) => {
  // add the authorization to the headers
  operation.setContext({
    headers: {
      accept: 'application/json',
      authorization: 'Bearer ' + localStorage.getItem(AUTH_TOKEN) || null
    }
  })
  return forward(operation)
})

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache: new InMemoryCache(),
  connectToDevTools: true
})

const apolloAuthClient = new ApolloClient({
  link: concat(authMiddleware, httpAuthLink),
  cache: new InMemoryCache(),
  connectToDevTools: true
})

const apolloProvider = new VueApollo({
  clients: {
    'default': apolloClient,
    'auth': apolloAuthClient
  },
  defaultClient: apolloClient,
  defaultOptions: {
    $loadingKey: 'loading'
  },
  errorHandler (error) {
    console.log('Global error handler')
    console.error(error)
  }
})

// leave the export, even if you don't use it
export default ({app, router, Vue}) => {
  // Install the vue plugin
  Vue.use(VueApollo)
  app.provide = apolloProvider.provide()
}
