/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable @typescript-eslint/no-unsafe-member-access */
/* eslint-disable @typescript-eslint/no-unsafe-return */
/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable sonarjs/no-duplicate-string */
import React from 'react'
import { NextPage } from 'next'
import { useQuery } from '@apollo/client'
import { Typography } from '@mui/material'
import _ from 'lodash'
import { FIND_CATEGORY, FIND_PRODUCT, GET_PRODUCTS } from '../../shared/services/Product'
import { ProductData, ProductVars } from '../../shared/interfaces/graphql/Product'

const About: NextPage = () => {
  const { loading, data } = useQuery<ProductData, ProductVars>(FIND_PRODUCT, {
    variables: {
      id: '1',
    },
    fetchPolicy: 'cache-first',
  })
  const { loading: load, data: cats } = useQuery<ProductData, ProductVars>(FIND_CATEGORY(15), {
    fetchPolicy: 'cache-first',
  })
  const {
    loading: loadingProducts,
    data: products,
  } = useQuery<any, any>(GET_PRODUCTS, {
    fetchPolicy: 'cache-first',
  })

  console.log(cats)
  console.log(products?.products)

  return (
    <div>
      {loading && <p>Loading...</p>}
      {data && (
        <div>
          <h1>About</h1>
          <Typography variant="h4">
            Product data:
            {' '}
            {data.product.name}
          </Typography>
        </div>
      )}
    </div>
  )
}

export default React.memo(About)
