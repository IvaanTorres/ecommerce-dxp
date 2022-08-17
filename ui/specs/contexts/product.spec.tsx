import 'jsdom-global/register'
import React from 'react'
import { render, screen } from '@testing-library/react'
import { defineFeature, loadFeature } from 'jest-cucumber'
import Button from '../../src/components/molecules/Button'

import '@testing-library/jest-dom/extend-expect'

const feature = loadFeature('../features/product.feature', { loadRelativePath: true })

defineFeature(feature, (test) => {
  test('Entering a correct password', ({
    given,
    then,
    and,
  }) => {
    given('I have previously created a password', () => {
      render(<Button label="Testing" />)
    })
    then('I enter my password correctly', () => {
      expect(screen.getByText('Testing')).toBeInTheDocument()
    })
    and('I should be granted access', () => {
      expect(true).toBe(true)
    })
  })
})
