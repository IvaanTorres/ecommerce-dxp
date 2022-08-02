/* eslint-disable no-unused-vars */
import type { NextPage } from 'next'
import React, { useEffect, useState } from 'react'
import Head from 'next/head'
import Image from 'next/image'
import styles from './index.module.scss'
import Button from '@mui/material/Button'
import { gql, useQuery } from '@apollo/client'
import { Typography } from '@mui/material'
import moment from 'moment'
import _ from 'lodash'


const FIND_PRODUCT = gql`
query {
  product(id: "api/products/1") {
    name
    id
  }
}
`

const Home: NextPage = () => {
  const [count, setCount] = useState(0)
  const { loading, data } = useQuery(FIND_PRODUCT)
  console.log(data);
  const time = moment().startOf('day').fromNow()
  const chunking = _.chunk(['a', 'b', 'c', 'd'], 3)
  console.log(chunking);



  // eslint-disable-next-line no-unused-vars
  let hey = 3

  

  return (
    <div>
      {loading ?
        <p>Loading...</p> :
        (
          <div>
            <Button variant="contained" onClick={() => setCount(count+1)}>Hello World</Button>
            <Typography variant='h4'>Product name: {data.product.name}</Typography>
            <p>{time}</p>
          </div>
        )
      }   
    </div>
  )
}

export default React.memo(Home)
