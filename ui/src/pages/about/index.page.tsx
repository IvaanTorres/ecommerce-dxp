import React from 'react'
import { NextPage } from 'next'
import { useQuery } from '@apollo/client'
import { Typography } from '@mui/material'
import { FIND_PRODUCT } from '../../shared/services/Product'
import { ProductData, ProductVars } from '../../shared/interfaces/graphql/Product'

const About: NextPage = () => {
  const { loading, data } = useQuery<ProductData, ProductVars>(FIND_PRODUCT, {
    variables: {
      id: '1',
    },
    fetchPolicy: 'cache-first',
  })

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
