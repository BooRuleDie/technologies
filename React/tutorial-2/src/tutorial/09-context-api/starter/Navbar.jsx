import { useState } from "react";
import Navlink from "./Navlink";
import { createContext } from "react";
export const NavbarContext = createContext()

const PropDrillingHell = () => {
    const [user, setUser] = useState({ name: "BooRuleDie" });
    const logout = () => {
        setUser(null);
    };
    return (
        <NavbarContext.Provider value={{user, logout}}>
            <h2>Sh1tty Navbar</h2>
            <Navlink
                content={"Hulolo 1"}
            />
            <Navlink
                content={"Hulolo 2"}
            />
            <Navlink
                content={"Hulolo 3"}
                displayUserContainer={true}
            />
        </NavbarContext.Provider>
    );
};
export default PropDrillingHell;
