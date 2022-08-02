import type { NextPage } from 'next'
import React, { useEffect, useState } from 'react'
import Head from 'next/head'
import Image from 'next/image'
import styles from '../styles/Home.module.css'
import Button from '@mui/material/Button'
import { gql, useQuery } from '@apollo/client'
import { Typography } from '@mui/material'


const query = gql`
query {
  product(id: "api/products/1") {
    name
    id
  }
}
`

const Home: NextPage = () => {
  const [count, setCount] = useState(0)
  const { loading, error, data } = useQuery(query)
  console.log(data);

  return (
    <div>
      {loading ?
        <p>Loading...</p> :
        (
          <div>
            <Button variant="contained" onClick={() => setCount(count+1)}>Hello World</Button>
            <Typography variant='h4'>Product name: {data.product.name}</Typography>
          </div>
        )
      }   
    </div>
  )
}

export default React.memo(Home)
