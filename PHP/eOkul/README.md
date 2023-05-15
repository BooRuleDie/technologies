# Brief Overview
[Click Here](https://youtu.be/nOmqYFCywCY)

# Roles
There are three main roles in the project.

1. Student
2. Teacher
3. Administrator

**Student:** This role is only able to read the grades that are assigned by the particular teachers.
**Teacher:** This role is able to read and write grades for the students who take lessons from them.
**Administrator:** This role is able to register new users in the system with any role and also assign a new lesson to a particular student and teacher.

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
