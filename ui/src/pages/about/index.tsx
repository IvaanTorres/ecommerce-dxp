import React from 'react';
import { NextPage } from "next"
import { useQuery } from '@apollo/client';
import { FIND_PRODUCT } from '../../enums/graphql/queries/Product';
import { Typography } from '@mui/material';

const About: NextPage = () => {
  const { loading, error, data } = useQuery(FIND_PRODUCT, {
    variables: {
      id: 'api/products/1'
    }
  })

  return (
    <div>
      {loading && <p>Loading...</p>}
      {data && (
        <div>
          <h1>About</h1>
          <Typography variant='h4'>Product data: {data.product.name}</Typography>
        </div>
      )}
    </div>
  )
}

export default React.memo(About)