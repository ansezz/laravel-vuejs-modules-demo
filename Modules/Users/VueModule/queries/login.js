import gql from 'graphql-tag'

export default gql`query loginQuery ( $email : String!, $password : String!){
    login(email: $email, password: $password)
}`
