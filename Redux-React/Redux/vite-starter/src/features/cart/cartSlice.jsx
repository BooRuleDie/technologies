import { createSlice } from "@reduxjs/toolkit";
import carItems from "../../cartItems";

const initialState = {
    cartItems: carItems,
    amount: 4,
    total: 0,
    isLoading: true,
};

const cartSlice = createSlice({
    name: "cart",
    initialState,
    reducers: {
        clearCart: (state) => {
            // returning something removes whole state
            state.cartItems = [];
        },
        removeItem: (state, action) => {
            state.cartItems = state.cartItems.filter((item) => {
                return item.id !== action.payload;
            });
        },
        increase: (state, action) => {
            const item = state.cartItems.find((item) => {
                return item.id === action.payload;
            });
            item.amount += 1;
        },
        decrease: (state, action) => {
            const item = state.cartItems.find((item) => {
                return item.id === action.payload;
            });
            if (item.amount > 1) {
                item.amount -= 1;
            } else {
                state.cartItems = state.cartItems.filter((item) => {
                    return item.id !== action.payload;
                });
            }
        },
        calculateTotals: (state) => {
            let amount = 0;
            let total = 0;

            state.cartItems.forEach((item) => {
                amount += item.amount;
                total += item.amount * item.price;
            });

            state.amount = amount;
            state.total = total;
        },
    },
});

export const { clearCart, removeItem, increase, decrease, calculateTotals } = cartSlice.actions;

export default cartSlice.reducer;
