import { data } from "../../../data";
import { useState } from "react";

const UserChallenge = () => {
    const [users, setUsers] = useState(data);
    const [name, setName] = useState("");
    console.log(users);
    return (
        <div>
            <form
                className="form"
                onSubmit={(e) => {
                    e.preventDefault();
                    setUsers((prevUsers) => {
                        return [
                            ...prevUsers,
                            { id: crypto.randomUUID(), name: name },
                        ];
                    });
                }}
            >
                <h4>Add User</h4>
                <div className="form-row">
                    <label htmlFor="name" className="form-label">
                        name
                    </label>
                    <input
                        type="text"
                        className="form-input"
                        id="name"
                        value={name}
                        onChange={(e) => {
                            setName(e.target.value);
                        }}
                    />
                </div>

                <button type="submit" className="btn btn-block">
                    submit
                </button>
            </form>
            <h2>Users</h2>
            {users.map((user) => {
                return (
                    <div key={user.id}>
                        <h4>{user.name}</h4>
                        <button
                            className="btn"
                            onClick={() => {
                                setUsers(
                                    users.filter((userFromFilter) => {
                                        return userFromFilter.id !== user.id;
                                    })
                                );
                            }}
                        >
                            Remove
                        </button>
                    </div>
                );
            })}
        </div>
    );
};
export default UserChallenge;
