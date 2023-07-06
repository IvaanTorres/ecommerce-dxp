/* eslint-disable react/button-has-type */
import React from 'react'

interface Props {
  title: string;
}

const Test = ({ title }: Props) => (
  <div>
    <h1>
      Test:
      {title}
    </h1>
    <button>Test button</button>
  </div>
)

export default React.memo(Test)
