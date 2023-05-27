export default function CustomListComponent({todos, deleteItem, toggleTodo}) {
  return (
    <>
      <div
        className="container mt-3 p-3 border rounded-3"
        style={{ width: "60%" }}
      >
        <h2 className="fw-bold text-center">To Do List</h2>
        <p className="fst-italic text-center pt-2" style={{ opacity: "50%" }}>
          {todos.length === 0 && "No todos"}
        </p>
        <ul className="list-group">
          {todos.map((todo) => {
            return (
              <li className="list-group-item d-flex" key={todo.id}>
                <input
                  className="form-check-input me-2 flex-shrink-0 my-auto"
                  type="checkbox"
                  onChange={(e) => toggleTodo(todo.id, e.target.checked)}
                />
                <div className="p-2">{todo.content}</div>

                <button
                  className="btn btn-outline-danger my-auto ms-auto"
                  style={{ height: "25px", lineHeight: "10px" }}
                  onClick={() => deleteItem(todo.id)}
                >
                  Delete
                </button>
              </li>
            );
          })}
        </ul>
      </div>
    </>
  );
}
