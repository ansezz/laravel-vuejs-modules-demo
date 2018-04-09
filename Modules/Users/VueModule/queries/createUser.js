import gql from 'graphql-tag'

export default gql`mutation($name :String!,$email : String!, $password : String!,$login : String!,$display_name :String!) {
    createUser(name : $name,email :  $email, password : $password,login : $login, display_name: $display_name){
        id,email,login,name,display_name
    }
}`
