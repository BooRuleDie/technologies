import { useState } from "react";

const MultipleInputs = () => {
    const [user, setUser] = useState({
        name: "",
        email: "",
        password: "",
    });
    // since the logic that we're going to apply is the same for all these input elements instead of passing anonymous functions with the help of onChange, we can just create a handleChange function and use it for all inputs
    const handleChange = (e) => {
        // console.log(e.target.name); // name value of the input element
        // console.log(e.target.value); // value of the input element

        // dynamically set
        setUser({ ...user, [e.target.name]: e.target.value });
    };
    return (
        <div>
            <form
                className="form"
                onSubmit={(e) => {
                    e.preventDefault();
                    console.log(`form submitted`);
                    console.log(user);
                    setUser({ name: "", email: "", password: "" });
                }}
            >
                <h4>Multiple Inputs</h4>
                {/* name */}
                <div className="form-row">
                    <label htmlFor="name" className="form-label">
                        name
                    </label>
                    <input
                        type="text"
                        className="form-input"
                        id="name"
                        name="name"
                        value={user.name}
                        onChange={handleChange}
                    />
                </div>
                {/* email */}
                <div className="form-row">
                    <label htmlFor="email" className="form-label">
                        Email
                    </label>
                    <input
                        type="email"
                        className="form-input"
                        id="email"
                        name="email"
                        value={user.email}
                        onChange={handleChange}
                    />
                </div>
                {/* email */}
                <div className="form-row">
                    <label htmlFor="password" className="form-label">
                        Password
                    </label>
                    <input
                        type="password"
                        className="form-input"
                        id="password"
                        name="password"
                        value={user.password}
                        onChange={handleChange}
                    />
                </div>

                <button type="submit" className="btn btn-block">
                    submit
                </button>
            </form>
        </div>
    );
};
export default MultipleInputs;
