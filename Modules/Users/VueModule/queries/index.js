import gql from 'graphql-tag'

export default gql`{
    users {
        id,status,name,email,display_name,created_at
    }
}`
