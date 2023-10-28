import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import "./index.css";

const title = "Some Title";
const author = "Some Author";

const BookList = () => {
    return (
        <div className="booklist">
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
            <Book title={title} author={author}/>
        </div>
    );
};

const Book = (props) => {
    return (
        <div className="book">
            <img
                src="https://picsum.photos/200/300"
                alt="random image from lorem image"
            />
            <h2>{props.title}</h2>
            <p
                style={{
                    opacity: "50%",
                    overflow: "hidden",
                    textOverflow: "ellipsis",
                }}
            >
                {props.author}
            </p>
        </div>
    );
};

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<BookList />);
