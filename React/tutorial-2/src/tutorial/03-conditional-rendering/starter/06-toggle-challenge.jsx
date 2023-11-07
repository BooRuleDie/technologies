import { useState } from "react";

const ToggleChallenge = () => {
    const [isToggledDown, setIsToggledDown] = useState(false);
    return (
        <>
            <button
                className="btn"
                onClick={() => {
                    setIsToggledDown(!isToggledDown);
                }}
            >
                Toggle
            </button>
            {isToggledDown && <SomeElement />}
        </>
    );
};

const SomeElement = () => {
    return (
        <>
            <h2 style={{ margin: "2rem 0" }}>Hello From Some Element</h2>
        </>
    );
};

export default ToggleChallenge;
