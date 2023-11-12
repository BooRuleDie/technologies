import { useState } from "react";

const UncontrolledInputs = () => {
    const [value, setValue] = useState(0);

    return (
        <div>
            <form
                className="form"
                onSubmit={(e) => {
                    e.preventDefault();
                    // console.log("e.target");
                    // console.log(e.target); // e.target refers to the DOM element that triggered the event
                    // console.log("e.currentTarget");
                    // console.log(e.currentTarget); // e.currentTarget refers to the DOM element that event-listener is listening on

                    const formData = new FormData(e.currentTarget); // you need to specify the DOM element that event-listener is listening on
                    const formInputs = Object.fromEntries(formData);
                    console.log(formInputs);
                    setValue(value + 1);
                    e.currentTarget.reset() // resets form input values
                }}
            >
                <h4>Form Data API</h4>
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
                    />
                </div>

                <button type="submit" className="btn btn-block">
                    submit
                </button>
            </form>
        </div>
    );
};
export default UncontrolledInputs;
