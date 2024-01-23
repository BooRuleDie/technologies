import { useCallback, useState } from "react";
import { data } from "../../../../data";
import List from "./List";
const LowerState = () => {
    const [people, setPeople] = useState(data);
    const [count, setCount] = useState(0);

    // have to use useCallBack if I want to use that function as prop function for the memo
    const removePerson = useCallback(
        (id) => {
            const newPeople = people.filter((person) => person.id !== id);
            setPeople(newPeople);
        },
        [people]
    );

    return (
        <section>
            <button
                className="btn"
                onClick={() => setCount(count + 1)}
                style={{ marginBottom: "1rem" }}
            >
                count {count}
            </button>
            <List people={people} removePerson={removePerson} />
        </section>
    );
};
export default LowerState;
