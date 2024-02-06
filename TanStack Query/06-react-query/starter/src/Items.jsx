import SingleItem from "./SingleItem";
import { useQuery, useMutation, useQueryClient } from "@tanstack/react-query";
import customFetch from "./utils";
import { toast } from "react-toastify";
import { useFetchTasks } from "./reactQueryCustomHooks";

const Items = () => {
    const fetchResult = useFetchTasks();

    if (fetchResult.isLoading) {
        return (
            <p style={{ marginTop: "1rem", textAlign: "center" }}>Loading...</p>
        );
    }

    if (fetchResult.isError) {
        return (
            <p style={{ marginTop: "1rem", textAlign: "center" }}>
                {/* axios error -> fetchResult.error.message */}
                {/* error we're getting from the server -> fetchResult.error.response.data */}
                Error: {fetchResult.error.response.data}
            </p>
        );
    }

    return (
        <div className="items">
            {fetchResult.data.data.taskList.map((item) => {
                return <SingleItem key={item.id} item={item} />;
            })}
        </div>
    );
};
export default Items;
