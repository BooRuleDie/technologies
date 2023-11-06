import { useEffect, useState } from "react";
const url = "https://api.github.com/users/QuincyLarson";

const MultipleReturnsFetchData = () => {
    const [user, setUser] = useState(null);
    const [isLoading, setIsLoading] = useState(true);
    const [isError, setIsError] = useState(false);

    useEffect(() => {
        setTimeout(() => {
            fetch(url)
                .then((response) => {
                    // if response is not 200
                    if (!response.ok) {
                        setIsLoading(false);
                        setIsError(true);
                        return <h1>Something Went Wrong</h1>;
                    }
                    return response.json();
                })
                .then((data) => {
                    setIsLoading(false);
                    setUser(data);
                })
                .catch((error) => {
                    console.error(error);
                    setIsLoading(false);
                    setIsError(true);
                });
        }, 3000);
    }, []);

    if (isLoading) {
        return <h1>Loading...</h1>;
    }

    if (isError) {
        return <h1>Something Went Wrong</h1>;
    }

    if (user) {
        return (
            <div>
                <img
                    src={user.avatar_url}
                    style={{ width: "8rem", borderRadius: "2rem" }}
                />
                <h4>{user.bio}</h4>
                <h2>Works at {user.company}</h2>
            </div>
        );
    }
};
export default MultipleReturnsFetchData;
