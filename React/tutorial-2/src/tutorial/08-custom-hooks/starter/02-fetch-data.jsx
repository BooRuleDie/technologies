import useGetGithubUser from "./Custom-Hook-2";

const FetchData = () => {
    const { isError, isLoading, user } = useGetGithubUser(
        "https://api.github.com/users/booruledie"
    );

    if (isLoading) {
        return <h2>Loading...</h2>;
    }
    if (isError) {
        return <h2>There was an error...</h2>;
    }
    const { avatar_url, name, company, bio } = user;
    return (
        <div>
            <img
                style={{ width: "100px", borderRadius: "25px" }}
                src={avatar_url}
                alt={name}
            />
            <h2>{name}</h2>
            {company && <h4>works at {company}</h4>}

            <p>{bio}</p>
        </div>
    );
};
export default FetchData;
