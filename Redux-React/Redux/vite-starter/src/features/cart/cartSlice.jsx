import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import carItems from "../../cartItems";
import axios from "axios";
import { openModal } from "../modal/modalSlice";

const initialState = {
    cartItems: [],
    amount: 0,
    total: 0,
    isLoading: true,
};

// export const getCartItems = createAsyncThunk("cart/getCartItems", () => {
//     const url = "https://course-api.com/react-useReducer-cart-project";
//     return fetch(url)
//         .then((response) => {
//             return response.json();
//         })
//         .catch((error) => {
//             console.log(error);
//         });
// });

export const getCartItems = createAsyncThunk(
    "cart/getCartItems",
    async (parameter_passed, thunkAPI) => {
        const url = "https://course-api.com/react-useReducer-cart-project";
        try {
            // console.log(parameter_passed);

            // you can access to whole app's state value thanks to thunkAPI
            // console.log(thunkAPI.getState());

            // and you can also apply dispatch
            // thunkAPI.dispatch(openModal());

            const response = await axios(url);
            return response?.data;
        } catch (error) {
            return thunkAPI.rejectWithValue("something went wrong");
        }
    }
);

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
    extraReducers: (builder) => {
        builder
            .addCase(getCartItems.pending, (state) => {
                state.isLoading = true;
            })
            .addCase(getCartItems.fulfilled, (state, action) => {
                console.log(action?.payload);

                // if it doesn't return undefined
                if (action?.payload) {
                    state.isLoading = false;
                    state.cartItems = action.payload;

                    // if it returns undefined, show an empty basket
                } else {
                    state.isLoading = false;
                    state.cartItems = [];
                }
            })
            .addCase(getCartItems.rejected, (state, action) => {
                console.log(action);
                state.isLoading = false;
            });
    },
});

export const { clearCart, removeItem, increase, decrease, calculateTotals } =
    cartSlice.actions;

export default cartSlice.reducer;
