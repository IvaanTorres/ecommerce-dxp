/* eslint-disable @typescript-eslint/no-unsafe-call */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
import type { NextPage } from 'next'
import React, { useEffect, useState } from 'react'
import Button from '@mui/material/Button'
import { ApolloClient, NormalizedCacheObject } from '@apollo/client'
import { Typography } from '@mui/material'
import moment from 'moment'
import _ from 'lodash'
import Link from 'next/link'
import { FIND_PRODUCT } from '../shared/services/Product'
import { increment } from '../redux/reducers/counter'
import { counter } from '../redux/selectors'
import { useAppDispatch, useAppSelector } from '../shared/hooks/redux'
import Counter from '../shared/interfaces/counter'
import Test from '../components/atoms/Test/Test'
import { ProductData, ProductVars } from '../shared/interfaces/graphql/Product'
import { addApolloState, initializeApollo } from '../config/apollo-client'
import env from '../shared/enums/config/environment'
import styles from './index.module.scss'
import colors from '../shared/enums/design-system/colors'
import fontSizes from '../shared/enums/design-system/font-sizes'
import boxShadows from '../shared/enums/design-system/box-shadows'

const INITIAL_COUNTER: Counter = {
  id: 0,
  name: '',
  value: 0,
}

interface Props {
  product: {
    data?: ProductData
    error?: Error
  }
}

const Home: NextPage<Props> = ({ product }) => {
  const dispatch = useAppDispatch()
  const counter2 = useAppSelector(counter)
  const [count, setCount] = useState<Counter>(INITIAL_COUNTER)

  const time = moment().startOf('day').fromNow()
  const chunking = _.chunk(['a', 'b', 'c', 'd'], 3)
  console.log(chunking)
  console.log(env.NEXT_PUBLIC_API_URL)

  useEffect(() => {
    setCount((prev) => ({
      ...prev,
      id: 1,
      name: 'test',
      value: 0,
    }))
  }, [])

  const handleClick = () => {
    dispatch(increment())
    setCount((prev) => ({
      ...prev,
      value: prev.value + 1,
    }))
  }

  return (
    <div>
      <h1
        style={{
          color: colors.red[700],
          fontSize: fontSizes.text_4xl,
        }}
      >
        Testing message
      </h1>
      <Link href="about/">Go to about</Link>
      {product.error && (
        <div data-testid="error">Error: {product.error.message}</div>
      )}
      {product.data && (
        <div className={styles.testing}>
          <Button
            variant="contained"
            onClick={handleClick}
            style={{
              boxShadow: boxShadows[3],
            }}
          >
            Push !
          </Button>
          <Test title="Test title" />
          <Typography variant="h4" data-testid="productName">
            Product name:{' '}
            {/* eslint-disable-next-line @typescript-eslint/no-unsafe-member-access */}
            {product.data.product.name}
          </Typography>
          <p>{time}</p>
          <p>Counter of the component: {count?.value}</p>
          {counter2.counters.map((c: Counter) => (
            <p key={c.id}>Counters name: {c.name}</p>
          ))}
          <p>Counters name: {counter2.name}</p>
        </div>
      )}
    </div>
  )
}

/* Home.defaultProps = {
  data: undefined,
} */

export const getServerSideProps = async () => {
  const client2: ApolloClient<NormalizedCacheObject> = initializeApollo()

  interface Product {
    data: ProductData
    error: Error
  }
  const product = await client2.query<Product, ProductVars>({
    query: FIND_PRODUCT,
    variables: {
      id: '1',
    },
    fetchPolicy: 'cache-first',
  })

  return addApolloState(client2, {
    props: {
      product,
    },
  })
}

export default React.memo(Home)
