import { data } from "../../../data";
import { CLEAR_ITEMS, RESET_ITEMS, REMOVE_ITEM } from "./actions";

export const reducer = (state, action) => {
    switch (action.type) {
        case CLEAR_ITEMS:
            return { ...state, people: [] };
        case RESET_ITEMS:
            return { ...state, people: data };
        case REMOVE_ITEM:
            console.log(action);
            return {
                ...state,
                people: state.people.filter((person) => {
                    return person.id !== action.payload.id;
                }),
            };
        default:
            return state;
    }
};