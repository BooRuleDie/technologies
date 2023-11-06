import { useEffect, useState } from "react";

const url = "https://api.github.com/users";

const FetchData = () => {
    const [users, setUsers] = useState([]);
    useEffect(() => {
        console.log("useEffect is running...");
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                setUsers(
                    data.map((user_item) => {
                        return {
                            id: user_item.id,
                            username: user_item.login,
                            userPage: user_item.html_url,
                            profilePicture: user_item.avatar_url,
                        };
                    })
                );
            });
    }, []);
    return (
        <>
            <h1>GitHub Users</h1>
            {users.map((userInfo) => {
                return (
                    <div key={userInfo.id}>
                        <h1>{userInfo.username}</h1>
                        <img
                            src={userInfo.profilePicture}
                            style={{
                                width: "8rem",
                                borderRadius: "1rem",
                            }}
                        />
                        <br />
                        <a href={userInfo.userPage}>Profile</a>
                    </div>
                );
            })}
        </>
    );
};
export default FetchData;
