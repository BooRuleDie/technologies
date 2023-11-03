

const ErrorExample = () => {

  
    return (
        <>
            <h2>UseState Error Example</h2>
            <h2>Counter: {counter}</h2>
            <button
                onClick={() => {
                    counter++;
                    console.log(counter); // you can see that counter variable increases but it's not displayed in the frontend
                }}
            >
                Click Me
            </button>
        </>
    );
};

export default ErrorExample;
