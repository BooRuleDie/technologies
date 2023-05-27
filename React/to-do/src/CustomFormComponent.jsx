import { useState } from "react";

export default function CustomFormComponent({ addToDo }) {
const [newItem, setNewItem] = useState("")

  function handleSubmit(e) {
    e.preventDefault();

    // this how you should update state data because if you called the setTodos two times by using todos array without creating a sub-function, the second setTodos would have override the todos that was updated by the first setTodos.
    addToDo(newItem)
  }

  return (
    <>
      <div className="container w-50 mt-3 p-3 border rounded-3">
        <form className="new-item-form" onSubmit={handleSubmit}>
          <div className="new-item-form-row">
            <h3 className="fw-bold text-center mb-3">Add Item</h3>
            <div className="input-group mb-3">
              <input
                type="text"
                className="form-control"
                placeholder="Go to the grocery"
                value={newItem}
                // it updates the newItem whenever the user makes a change in the input field
                onChange={(e) => setNewItem(e.target.value)}
              />
              <button className="btn btn-outline-primary fw-bold" type="submit">
                Add
              </button>
            </div>
          </div>
        </form>
      </div>
    </>
  );
}
