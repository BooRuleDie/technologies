# 4 Principles of OOP

1. **Inheritance**
2. **Polymorphism**
3. **Encapsulation**
4. **Abstraction**

## Inheritance

Inheritance is the process by which one class takes
on the attributes and methods of another. Newly formed
classes are called child classes, and the classes that child
classes are derived from are called parent classes.

Child classes inherit all of the parent's attributes and methods but
can also extend and overrides attributes and methods
that are unique to themselves.

## Polymorphism

"Many Shapes"

We can write a code that works on the superclass, and it will work
with any subclass type as well.

Gives a way to use a class exactly like its parent,
but each child class keeps its own methods as they are.

## Encapsulation

Encapsulation is the mechanism of hiding of data implementation.
Instance variables are kept private and accessor methods are made public to
achieve this. With this, we restrict access public methods (getter/setter).

Instance methods can also kept private.

## Abstraction

Abstraction can be thought of as a natural extension of encapsulation.
Applying abstraction means that each object should only expose a high-level mechanism for using it.

This mechanism should hide internal implementation details. 
It should only reveal operations relevant for the other objects.

### Credit: `Patrick Loeber`