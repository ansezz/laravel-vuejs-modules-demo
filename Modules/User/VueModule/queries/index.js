import gql from 'graphql-tag'

export default gql`{
    user {
        id,status,name,email,display_name
    }
}`
