import { useMutation, useQueryClient } from "@tanstack/react-query";
import { toast, useToast } from "react-toastify";
import customFetch from "./utils";
import { useUpdateTask, useDeleteTask } from "./reactQueryCustomHooks";

const SingleItem = ({ item }) => {
    const updateTask = useUpdateTask();
    const deleteTask = useDeleteTask();

    return (
        <div className="single-item">
            <input
                type="checkbox"
                checked={item.isDone}
                onChange={() =>
                    updateTask({ id: item.id, isDone: !item.isDone })
                }
            />
            <p
                style={{
                    textTransform: "capitalize",
                    textDecoration: item.isDone && "line-through",
                }}
            >
                {item.title}
            </p>
            <button
                className="btn remove-btn"
                type="button"
                onClick={() => deleteTask({ id: item.id })}
            >
                delete
            </button>
        </div>
    );
};
export default SingleItem;
