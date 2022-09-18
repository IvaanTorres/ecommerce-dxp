import { createSlice, PayloadAction } from '@reduxjs/toolkit'
import Counter from '../../shared/interfaces/counter'

export interface CounterState {
  counters: Counter[];
  name: string;
}

const initialState: CounterState = {
  counters: [{
    id: 1,
    name: 'Counter 1',
    value: 0,
  }],
  name: '',
}

//! https://redux.js.org/tutorials/essentials/part-2-app-structure
export const counterSlice = createSlice({
  name: 'counter',
  initialState,
  reducers: {
    increment: (state) => {
      state.name = 'Hello World'
    },
    decrement: (state) => {
      state.name = '1'
    },
    incrementByAmount: (state, action: PayloadAction<string>) => {
      state.name = action.payload
    },
  },
})

export const { increment, decrement, incrementByAmount } = counterSlice.actions

export default counterSlice.reducer
