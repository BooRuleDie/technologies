import { useQuery, useQueryClient } from "@tanstack/react-query";
import { useMutation } from "@tanstack/react-query";
import customFetch from "./utils";
import { toast } from "react-toastify";

export const useFetchTasks = () => {
    const fetchResult = useQuery({
        queryKey: ["fetchTasks"],
        queryFn: async () => {
            return await customFetch.get("/api/tasks");
        },
    });

    return fetchResult;
};

export const useCreateTask = () => {
    const queryClient = useQueryClient();
    const mutationResult = useMutation({
        mutationFn: async (newTitle) => {
            await customFetch.post("/api/tasks", { title: newTitle });
        },
        onSuccess: () => {
            toast.success("Task Added!");
            queryClient.invalidateQueries({ queryKey: ["fetchTasks"] });
        },
        onError: (error) => {
            toast.error(error.response.data.msg);
        },
    });

    return mutationResult;
};

export const useUpdateTask = () => {
    const queryClient = useQueryClient();
    const { mutate: updateTask } = useMutation({
        mutationFn: async ({ id, isDone }) => {
            await customFetch.patch(`/api/tasks/${id}`, { isDone: isDone });
        },
        onError: (error) => {
            toast.error(error.response.data.msg);
        },
        onSuccess: () => {
            queryClient.invalidateQueries({ queryKey: ["fetchTasks"] });
        },
    });

    return updateTask;
};

export const useDeleteTask = () => {
    const queryClient = useQueryClient();
    const { mutate: deleteTask } = useMutation({
        mutationFn: async ({ id }) => {
            await customFetch.delete(`/api/tasks/${id}`);
        },
        onError: (error) => {
            toast.error(error.response.data.msg);
        },
        onSuccess: () => {
            queryClient.invalidateQueries({ queryKey: ["fetchTasks"] });
        },
    });

    return deleteTask;
};
