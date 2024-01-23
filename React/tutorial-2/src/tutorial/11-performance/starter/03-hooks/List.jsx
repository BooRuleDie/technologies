import { memo } from "react";
import Item from "./Person";

const List = ({ people, removePerson }) => {
    return (
        <div>
            {people.map((person) => {
                return (
                    <>
                        <Item key={person.id} {...person} />
                        <button
                            onClick={() => {
                                removePerson(person.id);
                            }}
                        >
                            remove
                        </button>
                    </>
                );
            })}
        </div>
    );
};

// memo() disables re-renders if the props of the component hasn't changed,
// it doesn't work for function props
// in order to make it work as well, you need to explicitly specify useCallBack hook with the dependency array, look at index.jsx
export default memo(List);
