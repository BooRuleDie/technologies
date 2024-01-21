import { useReducer } from "react";
import { data } from "../../../data";
import { reducer } from "./reducer";
import { REMOVE_ITEM, CLEAR_ITEMS, RESET_ITEMS } from "./actions";

const defaultState = {
    isLoading: false,
    people: data,
};

const ReducerBasics = () => {
    const [state, dispatch] = useReducer(reducer, defaultState);

    return (
        <div>
            {state.people.map((person) => {
                return (
                    <div key={person.id} className="item">
                        <h4>{person.name}</h4>
                        <button
                            onClick={() =>
                                dispatch({
                                    type: REMOVE_ITEM,
                                    payload: { id: person.id },
                                })
                            }
                        >
                            remove
                        </button>
                    </div>
                );
            })}
            <button
                className="btn"
                style={{ marginTop: "2rem" }}
                onClick={() => {
                    if (state.people.length) {
                        dispatch({ type: CLEAR_ITEMS });
                    } else {
                        dispatch({ type: RESET_ITEMS });
                    }
                }}
            >
                {state.people.length ? "clear items" : "reset"}
            </button>
        </div>
    );
};

export default ReducerBasics;
