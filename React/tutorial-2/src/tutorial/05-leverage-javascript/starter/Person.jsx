import avatar from "../../../assets/default-avatar.svg";

const PersonComponent = ({ personInfo }) => {
    // optional chaining
    const img = personInfo.images?.[0]?.small?.url || avatar;
    // const img = personInfo.images?.[0]?.small?.url ?? avatar;
    // can be used as well, it returns the right value when left value is undefined or null

    return (
        <div>
            {personInfo.name && <h2>Name: {personInfo.name}</h2>}
            {personInfo.nickName && <h2>Nickname: {personInfo.nickName}</h2>}
            <img src={img} alt="some image" style={{ width: "5rem" }} />
            <hr style={{ width: "50%", margin: "3rem auto" }} />
        </div>
    );
};
export default PersonComponent;
