import { useState } from "react";

const UseStateObject = () => {
    const [name, setName] = useState("Peter");
    const [age, setAge] = useState(12);
    const [hobby, setHobby] = useState("Watching TV");

    return (
        <div>
            <h2>useState object example</h2>
            <h4>{name}</h4>
            <h4>{age}</h4>
            <h4>{hobby}</h4>
            <button
                className="btn"
                onClick={() => {
                    setName("John");
                    setAge(24);
                    setHobby("Gym");
                    // Normally react re-renders when there is a change in state or prop however in thise case there'd be just one re-render since React is smart enough to group all these state updates and perform only one re-render which is called auto-batching - React v18
                }}
            >
                Show John
            </button>
        </div>
    );
};

export default UseStateObject;
