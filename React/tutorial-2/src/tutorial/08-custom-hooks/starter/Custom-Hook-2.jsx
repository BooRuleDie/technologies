import { useEffect, useState } from "react";

/**
 * Custom hook to get a Github user's data
 * 
 * @param {string} [defaultValue] - GitHub User Link
 * @returns {object} - returns isError, isLoading and user Object
 */
const useGetGithubUser = (defaultValue) => {
    const [isLoading, setIsLoading] = useState(true);
    const [isError, setIsError] = useState(false);
    const [user, setUser] = useState(null);

    useEffect(() => {
        const fetchUser = async () => {
            try {
                const resp = await fetch(defaultValue);
                // console.log(resp);
                if (!resp.ok) {
                    setIsError(true);
                    setIsLoading(false);
                    return;
                }

                const user = await resp.json();
                setUser(user);
            } catch (error) {
                setIsError(true);
            }
            // hide loading
            setIsLoading(false);
        };
        fetchUser();
    }, []);
    return { isError, isLoading, user };
};

export default useGetGithubUser;
