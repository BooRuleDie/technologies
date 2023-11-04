import { useState } from "react";
import { data } from "../../../data";

const UseStateArray = () => {
    const [people, setPeople] = useState(data);
    console.log(people);
    return (
        <>
            <h2>useState array example</h2>
            <button
                className="btn"
                onClick={() => {
                    setPeople([]);
                }}
                style={{
                    marginBottom: "1rem",
                }}
            >
                Empty Entire Array
            </button>

            {people.map((person) => {
                return (
                    <div key={person.id}>
                        <h4>{person.name}</h4>
                        <button
                            className="btn"
                            onClick={() => {
                                setPeople(
                                    people.filter((personInFilter) => {
                                        return person.id !== personInFilter.id;
                                    })
                                );
                            }}
                        >
                            Remove
                        </button>
                    </div>
                );
            })}
        </>
    );
};

export default UseStateArray;
