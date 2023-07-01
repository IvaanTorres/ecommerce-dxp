/* eslint-disable @typescript-eslint/semi */
/* eslint-disable consistent-return */
/* eslint-disable no-plusplus */
/* eslint-disable no-param-reassign */
/* eslint-disable no-unreachable-loop */
/* eslint-disable sonarjs/no-one-iteration-loop */
import { gql } from '@apollo/client'

export const FIND_PRODUCT = gql`
query Find ($id: ID!){
  product (id: $id){
    id
    name
  }
}
`

export const GET_PRODUCTS = gql`
query {
  products {
    id
    name
    price
    categories {
      id
    }
    brand {
      id
    }
  }
}
`

export const FIND_CATEGORY = (levels: number) => {
  const nestedLevels = (currentLevel: number): string => {
    if (currentLevel <= 0) {
      return ''; // Base case: return an empty string when we reach the desired level
    }

    // Recursive case: return the nested levels
    return `
      children {
        id
        name
        ${nestedLevels(currentLevel - 1)}
      }
    `;
  };

  return gql`
    query {
      category(id: "3") {
        id
        name
        ${nestedLevels(levels)}
      }
    }
  `;
};
