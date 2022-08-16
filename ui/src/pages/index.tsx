/* eslint-disable no-unused-vars */
import type { NextPage } from 'next'
import React, { useEffect, useState } from 'react'
import Button from '@mui/material/Button'
import { useQuery } from '@apollo/client'
import { Typography } from '@mui/material'
import moment from 'moment'
import _ from 'lodash'
import { FIND_PRODUCT } from '../enums/graphql/queries/Product'
import { increment } from '../redux/reducers/counter'
import { counter } from '../redux/selectors'
import { useAppDispatch, useAppSelector } from '../hooks/redux'
import Counter from '../interfaces/counter'
import Link from 'next/link'
import Test from '../components/atoms/Test'

const Home: NextPage = ({}) => {
  const dispatch = useAppDispatch()
  const counter2 = useAppSelector(counter)
  const [count, setCount] = useState<Counter>()
  const { loading, error, data } = useQuery(FIND_PRODUCT, {
    variables: {
      id: 'api/products/1'
    }
  })
  console.log(data);
  const time = moment().startOf('day').fromNow()
  const chunking = _.chunk(['a', 'b', 'c', 'd'], 3)
  console.log(chunking);

  useEffect(() => {
    setCount((prev) => ({
      ...prev!,
      id: 1,
      name: 'test',
      value: 0
    }))
  }, [])

  const handleClick = () => {
    dispatch(increment())
    setCount((prev) => ({
      ...prev!,
      value: prev!.value + 1
    }))
  }

  return (
    <div>
      <h1>Testing message</h1>
      <Link href='about/'>Go to about</Link>
      {error && <div data-testid="error">Error: {error.message}</div>}
      {loading && <p>Loading...</p>}
      {data &&
        (
          <div>
            <Button variant="contained" onClick={handleClick}>Push !</Button>
            <Test title='Test title'></Test>
            <Typography variant='h4'>Product name: {data.product.name}</Typography>
            <p>{time}</p>
            <p>Counter of the component: {count?.value}</p>
            {counter2.counters.map((c: Counter) => <p key={c.id}>Counters name: {c.name}</p>)}
            <p>Counters name: {counter2.name}</p>
          </div>
        )
      }   
    </div>
  )
}

export default React.memo(Home)
