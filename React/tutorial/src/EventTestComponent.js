const EventTestComponent = () => {
    return (
        <>
            <form
                onSubmit={(e) => {
                    e.preventDefault();
                    console.log(e);
                    alert(
                        `you entered: ${e.target.elements.input_name_1.value}`
                    );
                }}
            >
                <h2>Submit Form</h2>
                <input type="text" name="input_name_1" />
                <button type="submit">Submit</button>
            </form>
        </>
    );
};

export default EventTestComponent;
