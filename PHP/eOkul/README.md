# Database Structure

## `users` Table

| Column Name | Data Type | Constraints  |
|-------------|-----------|--------------|
| id          | TEXT      | PRIMARY KEY  |
| name        | TEXT      | NOT NULL     |
| password    | TEXT      | NOT NULL     |
| role        | TEXT      | NOT NULL     |

```SQL
CREATE TABLE users (
    id TEXT PRIMARY KEY,
    name TEXT NOT NULL,
    password TEXT NOT NULL,
    role TEXT NOT NULL
);
```

## `grades` Table

| Column Name | Data Type | Constraints             |
|-------------|-----------|-------------------------|
| user_id     | TEXT      | FOREIGN KEY PRIMARY KEY |
| lesson_id   | TEXT      | FOREIGN KEY PRIMARY KEY |
| teacher_id  | TEXT      | FOREIGN KEY PRIMARY KEY |
| midterm1    | INTEGER   |                         |
| midterm2    | INTEGER   |                         |
| final       | INTEGER   |                         |

```SQL
CREATE TABLE grades (
    user_id TEXT REFERENCES users(id),
    lesson_id TEXT REFERENCES lessons(id),
    teacher_id TEXT REFERENCES users(id),
    midterm1 INTEGER,
    midterm2 INTEGER,
    final INTEGER,
	PRIMARY KEY (user_id, lesson_id, teacher_id)
);
```

## `lessons` Table

| Column Name | Data Type | Constraints             |
|-------------|-----------|-------------------------|
| lesson_id   | TEXT      | PRIMARY KEY             |

```SQL
CREATE TABLE lessons (
    id TEXT PRIMARY KEY
);
```
