/* eslint-disable import/prefer-default-export */
import { RootState } from './configureStore'
import { CounterState } from './reducers/counter'

/* --------------------------------- Slices --------------------------------- */
export const counter = (state: RootState): CounterState => state.counter
