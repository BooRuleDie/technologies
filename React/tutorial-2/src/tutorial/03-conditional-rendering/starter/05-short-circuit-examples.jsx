import { useState } from "react";

const ShortCircuitExamples = () => {
    // falsy
    const [text, setText] = useState("");
    // truthy
    const [name, setName] = useState("susan");
    const [user, setUser] = useState({ name: "john" });
    const [isEditing, setIsEditing] = useState(false);

    return (
        <>
            <h2>{text || "default value"}</h2>
            <h2>{text && "There is a text value"}</h2>
            <h2>{!text && "There is no text value"}</h2>
            <h2>{!text && <ShortCircuitExampleComp name={user.name} />}</h2>
            <button className="btn">{isEditing ? "edit" : "add"}</button>
            {text ? (
                <>
                    <h2>There is text</h2>
                    <h4>from ternary operator</h4>
                </>
            ) : (
                <>
                    <h2>There is no text</h2>
                    <h4>from ternary operator</h4>
                </>
            )}
        </>
    );
};

const ShortCircuitExampleComp = ({ name }) => {
    return (
        <>
            <h4>Given Name: {name}</h4>
            <h4>Hi from inner Component</h4>
        </>
    );
};

export default ShortCircuitExamples;
