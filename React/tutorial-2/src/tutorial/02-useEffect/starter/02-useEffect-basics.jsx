import { useState, useEffect } from "react";

const UseEffectBasics = () => {
    const [value, setValue] = useState(0);
    useEffect(() => {
        console.log("logging from useEffect");
    }, []); // when you don't specify a dependency array it's invoked each re-render and mounting(first render)
    // however if you specify an empty array, it'll be called only when mounting

    const sayHello = () => {
        console.log("hello there");
    };

    sayHello();

    return (
        <div>
            <h1>value : {value}</h1>
            <button className="btn" onClick={() => setValue(value + 1)}>
                click me
            </button>
        </div>
    );
};
export default UseEffectBasics;
