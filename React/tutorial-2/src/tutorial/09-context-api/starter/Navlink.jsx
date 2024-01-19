import UserContainer from "./UserContainer";

const Navlink = ({ content, displayUserContainer }) => {
    return (
        <>
            <a href="#" style={{ margin: "0 1rem" }}>
                {content}
            </a>
            {displayUserContainer ? <UserContainer /> : null}
        </>
    );
};
export default Navlink;
