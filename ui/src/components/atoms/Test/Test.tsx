/* eslint-disable arrow-body-style */
/* eslint-disable import/extensions */
/* eslint-disable @typescript-eslint/ban-types */
/* eslint-disable @typescript-eslint/no-unsafe-assignment */
/* eslint-disable @typescript-eslint/await-thenable */
/* eslint-disable @typescript-eslint/no-unsafe-call */

'use client'

import React from 'react'
import { useMutation } from '@apollo/client'
import { UPDATE_PRODUCT } from '@/src/shared/services/Product'
/* eslint-disable react/button-has-type */

interface Props {
  title: string;
}

const Test = ({ title }: Props) => {
  // const [updateProduct] = useMutation(UPDATE_PRODUCT, {
  //   variables: {
  //     id: '3',
  //     name: 'Updated product name',
  //   },
  // })

  return (
    <div>
      <button onClick={async () => {
        // await updateProduct()
        // await update()
      }}
      >
        {title}
      </button>
    </div>
  )
}

export default React.memo(Test)
