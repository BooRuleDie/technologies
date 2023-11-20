import { useState } from "react";

const useToggle = (defaultValue) => {
    const [show, setShow] = useState(defaultValue);
    const toggle = () => {
        setShow(!show);
    };

    return { show, toggle }; // you can either return an array or object
};

export default useToggle;
