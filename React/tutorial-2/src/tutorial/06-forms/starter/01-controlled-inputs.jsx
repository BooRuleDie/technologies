import { useState } from "react";

const ControlledInputs = () => {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    return (
        <form
            className="form"
            onSubmit={(e) => {
                e.preventDefault();
                // perform API calls here
                console.log(name, email);
            }}
        >
            <h1>Controlled Inputs</h1>
            <div className="form-row">
                <label htmlFor="name" className="form-label">
                    Name
                </label>
                <input
                    type="text"
                    id="name"
                    className="form-input"
                    onChange={(e) => {
                        setName(e.target.value);
                    }}
                    value={name}
                />
            </div>
            <div className="form-row">
                <label htmlFor="email" className="form-label">
                    Email
                </label>
                <input
                    type="text"
                    id="email"
                    className="form-input"
                    onChange={(e) => {
                        setEmail(e.target.value);
                    }}
                    value={email}
                />
            </div>
            <button type="submit" className="btn btn-block">
                submit
            </button>
        </form>
    );
};
export default ControlledInputs;
