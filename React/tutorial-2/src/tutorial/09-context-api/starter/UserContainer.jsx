import { useContext } from "react";
import { NavbarContext } from "./Navbar";

const UserContainer = () => {
    const {user, logout} = useContext(NavbarContext);
    
    return (
        <>
            <div>
                {user ? (
                    <a
                        href="#"
                        onClick={() => {
                            logout();
                        }}
                    >
                        {" "}
                        <p>Hi, {user?.name}</p>{" "}
                        <button className="btn">Logout</button>
                    </a>
                ) : (
                    <h5>Please Login</h5>
                )}
            </div>
        </>
    );
};
export default UserContainer;
