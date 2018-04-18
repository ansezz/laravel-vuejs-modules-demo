import gql from 'graphql-tag'

export default gql`mutation loginUserMutation($email : String!, $password : String!) {
  loginUser(
    email :  $email,
    password : $password
  )
}`
