import { useState } from "react";

const CodeExample = () => {
    const [value, setValue] = useState(0);
    const logRendering = () => {
        console.log("Rendering...");
    };

    logRendering(); // it'll be called each re-render and the mounting(first render) since re-render happens each time when there is a change in states or props
    return (
        <div>
            <h1>value : {value}</h1>
            <button className="btn" onClick={() => setValue(value + 1)}>
                click me
            </button>
        </div>
    );
};
export default CodeExample;
