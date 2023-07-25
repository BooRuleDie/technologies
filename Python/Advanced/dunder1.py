class Person:

    def __init__(self, name, age):
        self.name = name
        self.age = age

    # finalizer method -> it's getting called when the object is about to garbage collected
    def __del__(self):
        # you'll see the message when the object is garbage collected
        print(f"{self.name} -> Object Garbage Collected")

p = Person("BooRuleDie", 21)
p1 = Person("Mike", 21)
p2 = Person("Hulolo", 21)

# manual delete
del p2
del p1


