import { createContext, useContext, useState } from "react";
import { people } from "./data";

const GlobalContext = createContext();
export const useGlobalContext = () => useContext(GlobalContext);

const AppContext = ({ children }) => {
    const [name, setName] = useState("");
    const [people, setPeople] = useState([
        { id: 1, name: "bob", nickName: "Stud Muffin" },
        { id: 2, name: "peter" },
        {
            id: 3,
            name: "oliver",
            images: [
                {
                    small: {
                        url: "https://res.cloudinary.com/diqqf3eq2/image/upload/ar_1:1,bo_5px_solid_rgb:ff0000,c_fill,g_auto,r_max,w_1000/v1595959121/person-1_aufeoq.jpg",
                    },
                },
            ],
        },
        { id: 4, name: "david" },
    ]);

    return (
        <GlobalContext.Provider value={{ name, setName, people, setPeople }}>
            {children}
        </GlobalContext.Provider>
    );
};
export default AppContext;
