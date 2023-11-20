import { useEffect, useRef, useState } from "react";

const UseRefBasics = () => {
    const [value, setValue] = useState(0);
    const inputContainer = useRef(null); // inputContainer.current = null
    // before the mounting we see the value of the useRef is the default value so if you want to do something on only re-render and not on initial render you can use useRef
    const isMounted = useRef(false);

    useEffect(() => {
        if (!isMounted.current) {
            // initial render
            isMounted.current = true;
            console.log("I didn't let it run since it's initial render");
            return;
        }
        // re-render
        console.log("It's re-rendering...");
    }, [value]);
    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(inputContainer.current.value);
    };

    return (
        <div>
            <form className="form" onSubmit={handleSubmit}>
                <div className="form-row">
                    <label htmlFor="name" className="form-label">
                        Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        className="form-input"
                        ref={inputContainer}
                    />
                </div>
                <button type="submit" className="btn btn-block">
                    submit
                </button>
            </form>
            <h1>value : {value}</h1>
            <button onClick={() => setValue(value + 1)} className="btn">
                increase
            </button>
        </div>
    );
};

export default UseRefBasics;
