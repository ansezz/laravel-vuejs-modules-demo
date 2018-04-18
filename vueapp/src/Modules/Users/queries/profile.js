import gql from 'graphql-tag'

export default gql`{
  profile {
    id,status,name,email,display_name,login
  }
}`
