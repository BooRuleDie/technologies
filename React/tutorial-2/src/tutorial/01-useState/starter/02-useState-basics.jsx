import { useState } from "react";

// you can't create the state variables at the very top of the file, you should create them at the top of the Component Body
// const [counter, setCounter] = useState(0);

const UseStateBasics = () => {
    const [counter, setCounter] = useState(0);
    return (
        <>
            <h2>Counter: {counter}</h2>
            <button
                onClick={() => {
                    setCounter(counter + 1);
                }}
            >
                Click Here
            </button>
        </>
    );
};

export default UseStateBasics;
