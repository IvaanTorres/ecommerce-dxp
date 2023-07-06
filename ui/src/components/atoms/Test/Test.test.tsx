// This is necessary to make the tests work using Tetsing Library
import '@testing-library/jest-dom'

import React from 'react'
import { render, screen } from '@testing-library/react'
import Test from './Test'

describe('testing', () => {
  it('testing', () => {
    expect(true).toBe(true)
  })

  it('button has text', () => {
    render(<Test title="test" />)
    const testText = screen.getByText(/Test button/i)
    expect(testText).toBeInTheDocument()
  })
})
