import { useEffect, useState } from "react";

const CleanupFunction = () => {
    const [isClicked, setIsClicked] = useState(false);
    return (
        <>
            <button
                className="btn"
                onClick={() => {
                    setIsClicked(!isClicked);
                }}
            >
                Click
            </button>
            {/* useEffect in the SomeComponent will be invoked whenever the SomeComponent mounts */}
            {isClicked && <EventListenerComponent />}
        </>
    );
};

const SomeComponent = () => {
    useEffect(() => {
        console.log("Hello from useEffect within SomeComponent");
        const interval = setInterval(() => {
            console.log("hello from interval");
            // if you don't use a clean-up function here setInterval won't stop even though you unmount the SomComponent Component
        }, 1000);

        // the syntax of the clean-up function
        return () => {
            clearInterval(interval);
        };
    }, []);
    return (
        <>
            <h4 style={{ margin: "2rem 0" }}>Hello from Some Component</h4>
        </>
    );
};

const EventListenerComponent = () => {
    useEffect(() => {
        const someFunction = () => {
            // some logic here
        };

        // attach the event listener to the window object
        window.addEventListener("scroll", someFunction);

        // now if you don't use a clean-up function, you'll see lots of event-listeners on your window object after hitting toggle button a few times
        // in order to avoid it, we need to use a clean-up function again
        return () => {
            window.removeEventListener("scroll", someFunction);
        };
    }, []);
    return (
        <>
            <h4 style={{ margin: "2rem 0" }}>
                Hello from Event Listener Component
            </h4>
        </>
    );
};

export default CleanupFunction;
