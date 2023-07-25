class Vector:
    def __init__(self, x, y):
        self.x = x
        self.y = y

    # defined a new way to perform adding operations using vectors
    def __add__(self, other):
        return Vector(self.x + other.x, self.y + other.y)

    # def __str__(self):
    #     return f"{self.x}, {self.y}"

    def __repr__(self):
        return f"x -> {self.x}, y -> {self.y}"

    # __repr__ and __str__ do almost same thing but the intended use cases of these dunder are different.
    # __repr__is used to give user a more detailed info about the object.
    # __str__ is used to give a more compact and easy-to-read information about the object.

    def __len__(self):
        return 1337
    
    # gets called when you call the object
    def __call__(self):
        print("I've just called.")


v1 = Vector(5, 5)
v2 = Vector(10, 10)
v3 = v1 + v2
print(v3)
print(len(v3))  # 1337
v3()
