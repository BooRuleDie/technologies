import { useEffect, useState } from "react";

const MultipleReturnsBasics = () => {
    const [isLoading, setIsLoading] = useState(true);
    useEffect(() => {
        setTimeout(() => {
            setIsLoading(false);
        }, 3000);
    }, []);

    if (isLoading) {
      return <h1>Loading...</h1>
    }

    return <h2>Loading COMPLETE!</h2>;
};
export default MultipleReturnsBasics;
