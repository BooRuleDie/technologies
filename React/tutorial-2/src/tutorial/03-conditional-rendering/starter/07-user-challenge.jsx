import { useState } from "react";

const UserChallenge = () => {
    const [user, setUser] = useState(null);
    const login = () => {
        setUser({
            name: "Mikasa Ackerman",
        });
    };
    const logout = () => {
        setUser(null);
    };

    return (
        <>
            <button
                className="btn"
                onClick={() => {
                    user ? logout() : login();
                }}
            >
                {user ? "logout" : "login"}
            </button>
            <h4 style={{ margin: "2rem 0" }}>
                {user ? `hello from ${user.name}` : "please login"}
            </h4>
        </>
    );
};

export default UserChallenge;
