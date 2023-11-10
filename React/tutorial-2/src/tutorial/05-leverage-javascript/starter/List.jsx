import { people } from "../../../data";
import PersonComponent from "./Person";

const ListComponent = () => {
    return (
        <>
            {people.map((person) => {
                return <PersonComponent personInfo={person} key={person.id}/>;
            })}
        </>
    );
};

export default ListComponent;
 