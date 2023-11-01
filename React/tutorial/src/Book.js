// destructing in the parameter section
// children is a special prop that you can use when you want to add JSX to a particular component and don't want to affect other components (name must be 'children')
const Book = ({ title, author, src, children }) => {
    return (
        <div className="book">
            <img src={src} alt="random image from lorem image" />
            <h2>{title}</h2>
            <p
                // inline css
                style={{
                    opacity: "50%",
                    overflow: "hidden",
                    textOverflow: "ellipsis",
                }}
            >
                {author}
            </p>
            {/* <button
                onClick={() => {
                    console.log(challenge1(id));
                }}
            >
                Log Book Data
            </button> */}
            {/* using children prop */}
            <div>{children}</div>
        </div>
    );
};

export default Book;
