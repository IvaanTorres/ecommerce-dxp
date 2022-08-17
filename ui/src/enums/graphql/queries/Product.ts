import { gql } from '@apollo/client';

export const FIND_PRODUCT = gql`
query Find ($id: ID!){
  product (id: $id){
    id
    name
  }
}
`
