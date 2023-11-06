import { useState } from "react";

const ShortCircuitOverview = () => {
    const [falsy, setFalsy] = useState(NaN);
    const [truthy, setTruthy] = useState("truthy string");

    return (
        <>
            <h4>falsy && truthy -&gt; {falsy && truthy}</h4>

            <h4>truthy && falsy -&gt; {truthy && falsy}</h4>

            <h4>truthy && truthy -&gt; {truthy && truthy}</h4>

            <h4>falsy && falsy -&gt; {falsy && falsy}</h4>

            <hr />

            <h4>falsy || truthy -&gt; {falsy || truthy}</h4>

            <h4>truthy || falsy -&gt; {truthy || falsy}</h4>

            <h4>truthy || truthy -&gt; {truthy || truthy}</h4>

            <h4>falsy || falsy -&gt; {falsy || falsy}</h4>
        </>
    );
};
export default ShortCircuitOverview;
