import { useMutation, useQueryClient } from "@tanstack/react-query";
import { useState } from "react";
import customFetch from "./utils";
import { useCreateTask } from "./reactQueryCustomHooks";

const Form = () => {
    const [newItemName, setNewItemName] = useState("");
    const mutationResult = useCreateTask();

    const handleSubmit = (e) => {
        e.preventDefault();
        mutationResult.mutate(newItemName, {
            onSuccess: () => {
                setNewItemName("");
            },
        });
    };
    return (
        <form onSubmit={handleSubmit}>
            <h4>task bud</h4>
            <div className="form-control">
                <input
                    type="text "
                    className="form-input"
                    value={newItemName}
                    onChange={(event) => setNewItemName(event.target.value)}
                />
                <button type="submit" className="btn">
                    add task
                </button>
            </div>
        </form>
    );
};
export default Form;
