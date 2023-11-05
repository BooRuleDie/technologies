import { useState } from "react";

const UseStateGotcha = () => {
    const [counter, setCounter] = useState(0);
    return (
        <>
            <h2>{counter}</h2>
            <button
                className="btn"
                onClick={() => {
                    // setCounter(counter + 1);
                    // console.log(`Counter: ${counter}`);
                    // as you can see you can't get the latest counter value with this approach
                    // if you need to get the latest state value you can pass a anonymous function instead just like that
                    setCounter((prevState) => {
                        console.log(prevState + 1);
                        return prevState + 1;
                    });
                }}
            >
                Increase
            </button>
        </>
    );
};

export default UseStateGotcha;
