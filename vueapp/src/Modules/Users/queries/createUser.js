import gql from 'graphql-tag'

export default gql`mutation createUserMutation( $name :String! , $email : String! , $password : String! , $login : String! , $display_name : String! , $status : Boolean ) {
  createUser( name : $name , email :  $email , password : $password , login : $login , display_name : $display_name , status : $status) {
    id
  }
}`
