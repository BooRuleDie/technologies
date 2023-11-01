export const book_db = [
    {
        id: 1,
        title: "some title",
        author: "some author",
        src: "https://picsum.photos/200/300",
    },
    {
        id: 2,
        title: "some title 1",
        author: "some author 1",
        src: "https://picsum.photos/200/301",
    },
    {
        id: 3,
        title: "some title 2",
        author: "some author 2",
        src: "https://picsum.photos/200/302",
        children: (
            <>
                <hr style={{ margin: "1rem 0" }} />
                <p>
                    Thanks to{" "}
                    <span style={{ fontWeight: "bold" }}>children</span> prop, I
                    can create this special paragraph.
                </p>
            </>
        ),
    },
    {
        id: 4,
        title: "some title 3",
        author: "some author 3",
        src: "https://picsum.photos/200/303",
    },
];
// destructuring
// const { title, author, src } = book_db[0];