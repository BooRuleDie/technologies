import { useState, useEffect } from "react";
import CustomFormComponent from "./CustomFormComponent";
import CustomListComponent from "./CustomListComponent";

export default function App() {
  // any type of data that will be changed should be defined in the state. All dynamic variable should be in the state
  const [todos, setTodos] = useState(() => {
    const localValue = localStorage.getItem("ITEMS")

    if (localValue == null) return []
    
    return JSON.parse(localValue)

  });

  useEffect(() => {
    localStorage.setItem("ITEMS", JSON.stringify(todos))
  }, [todos])

  function addToDo(content) {
    setTodos((currentTodos) => {
      return [
        // this is how to append todos array in React
        ...currentTodos,
        {
          id: crypto.randomUUID(),
          content,
          completed: false,
        },
      ];
    });
  }

  function toggleTodo(id, completed) {
    setTodos((currentTodos) => {
      return currentTodos.map((todo) => {
        if (todo.id === id) {
          return { ...todo, completed };
        }

        return todo;
      });
    });
  }

  function deleteItem(id) {
    setTodos((currentTodos) => {
      return currentTodos.filter((todo) => todo.id !== id);
    });
  }

  // console.log(todos)

  return (
    <>
      <CustomFormComponent addToDo={addToDo}/>
     <CustomListComponent todos={todos} deleteItem={deleteItem} toggleTodo={toggleTodo}/>
    </>
  );
}
